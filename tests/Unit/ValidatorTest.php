<?php

use Core\Validator;

it('validate a string', function () {
    expect(Validator::string('foobar'))->toBeTrue();
    expect(Validator::string(false))->toBeFalse();
    expect(Validator::string(''))->toBeFalse();
});

it('validate a string with a minimum length', function () {
    expect(Validator::string('foobar', 20))->toBeFalse();
});

it('validate an email', function () {
    expect(Validator::email('foobar'))->toBeFalse();
    expect(Validator::email('foobar@gmail.com'))->toBeTrue();
});

it('validate that a number is greater than a giver number', function () {
    expect(Validator::greaterThan(10, 1))->toBeTrue();
    expect(Validator::greaterThan(10, 100))->toBeFalse();
})->only();
