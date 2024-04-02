<?php

use PeterFox\ExtendableMailMessage\Tests\Source\ExtendableMailMessageExample;

it('it can be initialised with traits', function (): void {
    $mailMessage = new ExtendableMailMessageExample();

    expect($mailMessage->loaded)->toBe(true);
});

it('it boots the trait only once', function (): void {
    new ExtendableMailMessageExample();
    $mailMessage = new ExtendableMailMessageExample();

    expect($mailMessage::$bootedTrait)->toBe(1);
});
