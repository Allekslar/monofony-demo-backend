<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle;

final class PetStates
{
    public const NEW = 'new';

    public const BOOKABLE = 'bookable';

    public const BOOKED = 'booked';

    public const ADOPTED = 'adopted';

    public const ALL = [
        self::NEW,
        self::BOOKABLE,
        self::BOOKED,
        self::ADOPTED,
    ];

    private function __construct()
    {
    }

    public static function choices(): array
    {
        return [
            'app.ui.new' => self::NEW,
            'app.ui.bookable' => self::BOOKABLE,
            'app.ui.booked' => self::BOOKED,
            'app.ui.adopted' => self::ADOPTED,
        ];
    }
}
