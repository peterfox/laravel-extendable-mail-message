<?php

it('it can be initialised with traits', function () {
    $mailMessage = new \PeterFox\ExtendableMailMessage\Tests\Source\ExtendableMailMessageExample();

    expect($mailMessage->loaded)->toBe(true);
});

it('it boots the trait only once', function () {
    new \PeterFox\ExtendableMailMessage\Tests\Source\ExtendableMailMessageExample();
    $mailMessage = new \PeterFox\ExtendableMailMessage\Tests\Source\ExtendableMailMessageExample();

    expect($mailMessage::$bootedTrait)->toBe(1);
});
