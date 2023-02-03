<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Dashboard\Statistics;

use Allekslar\MonofonyDemoBackendBundle\Repository\BookingRepository;
use Monofony\Component\Admin\Dashboard\Statistics\StatisticInterface;
use Twig\Environment;

final class BookingStatistic implements StatisticInterface
{
    public function __construct(
        private BookingRepository $bookingRepository,
        private Environment $engine
    ) {
    }

    public function generate(): string
    {
        $amountBookings = $this->bookingRepository->countBookings();

        return $this->engine->render('backend/dashboard/statistics/_amount_of_bookings.html.twig', [
            'amountOfBookings' => $amountBookings,
        ]);
    }

    public static function getDefaultPriority(): int
    {
        return -2;
    }
}
