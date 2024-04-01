<?php

namespace PeterFox\ExtendableMailMessage;

use Illuminate\Notifications\Messages\MailMessage as BaseMailMessage;

class ExtendableMailMessage extends BaseMailMessage
{
    /**
     * The array of booted mail messages.
     */
    protected static array $booted = [];


    /**
     * The array of trait initializers that will be called on each new instance.
     */
    protected static array $traitInitializers = [];

    /**
     * Check if the model needs to be booted and if so, do it.
     *
     * @return void
     */
    protected function bootIfNotBooted(): void
    {
        if (! (static::$booted[static::class] ?? false)) {
            static::$booted[static::class] = true;
            self::bootTraits();
        }
    }

    protected static function bootTraits(): void
    {
        $class = static::class;
        $booted = [];

        static::$traitInitializers[$class] = [];

        foreach (class_uses_recursive($class) as $trait) {
            $traitBaseName = class_basename($trait);
            $method = "boot$traitBaseName";

            if (method_exists($class, $method) && ! in_array($method, $booted)) {
                forward_static_call([$class, $method]);

                $booted[] = $method;
            }

            if (method_exists($class, $method = "initialize$traitBaseName")) {
                static::$traitInitializers[$class][] = $method;

                static::$traitInitializers[$class] = array_unique(
                    static::$traitInitializers[$class]
                );
            }
        }
    }

    final public function __construct()
    {
        $this->bootIfNotBooted();
        $this->initializeTraits();
    }

    protected function initializeTraits(): void
    {
        foreach (static::$traitInitializers[static::class] as $method) {
            $this->{$method}();
        }
    }
}
