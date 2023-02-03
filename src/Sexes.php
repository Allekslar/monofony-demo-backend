<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle;

final class Sexes
{
    public const MALE = 'male';

    public const FEMALE = 'female';

    public const ALL = [
        self::MALE,
        self::FEMALE,
    ];

    private function __construct()
    {
    }

    public static function choices(): array
    {
        return [
            'app.ui.male' => self::MALE,
            'app.ui.female' => self::FEMALE,
        ];
    }
}
