<?php

namespace PeterFox\ExtendableMailMessage\Tests\Source;

trait HasMetadata
{
    public static int $bootedTrait = 0;

    public bool $loaded = false;

    public static function bootHasMetadata(): void
    {
        self::$bootedTrait++;
    }

    public function initializeHasMetadata(): void
    {
        $this->loaded = true;
    }
}
