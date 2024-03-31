# Laravel Extendable Mail Message

[![Latest Version on Packagist](https://img.shields.io/packagist/v/peterfox/laravel-extendable-mail-message.svg?style=flat-square)](https://packagist.org/packages/peterfox/laravel-extendable-mail-message)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/peterfox/laravel-extendable-mail-message/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/peterfox/laravel-extendable-mail-message/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/peterfox/laravel-extendable-mail-message/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/peterfox/laravel-extendable-mail-message/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/peterfox/laravel-extendable-mail-message.svg?style=flat-square)](https://packagist.org/packages/peterfox/laravel-extendable-mail-message)

A package to use a mail message for notification that's easier to extend

## Installation

You can install the package via composer:

```bash
composer require peterfox/laravel-extendable-mail-message
```

## Usage

```php
use Illuminate\Notifications\Notification;

class MyNotification extends Notification
{
    public function toMail(object $notifiable): MailMessage
    {
        return PeterFox\MailMessage::make()
            ->error()
            ->subject('Invoice Payment Failed')
            ->line('...');
    }
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Peter Fox](https://github.com/peterfox)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
