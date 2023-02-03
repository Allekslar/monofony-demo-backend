<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle;

class SizeUnits
{
    public const METER = 'meter';

    public const CENTIMETER = 'centimeter';

    public const MILLIMETER = 'millimeter';

    public const ALL = [
        self::MILLIMETER,
        self::CENTIMETER,
        self::METER,
    ];

    private function __construct()
    {
    }

    public static function choices(): array
    {
        return [
            'app.ui.millimeter' => self::MILLIMETER,
            'app.ui.centimeter' => self::CENTIMETER,
            'app.ui.meter' => self::METER,
        ];
    }
}
