<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle;

final class SizeRanges
{
    public const SMALL = 'small';

    public const MEDIUM = 'medium';

    public const TALL = 'tall';

    public const ALL = [
        self::SMALL,
        self::MEDIUM,
        self::TALL,
    ];

    private function __construct()
    {
    }

    public static function choices(): array
    {
        return [
            'app.ui.small' => self::SMALL,
            'app.ui.medium' => self::MEDIUM,
            'app.ui.tall' => self::TALL,
        ];
    }
}
