<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Dashboard\Statistics;

use Allekslar\MonofonyDemoBackendBundle\Repository\PetRepository;
use Monofony\Component\Admin\Dashboard\Statistics\StatisticInterface;
use Twig\Environment;

final class PetStatistic implements StatisticInterface
{
    public function __construct(
        private PetRepository $petRepository,
        private Environment $engine
    ) {
    }

    public function generate(): string
    {
        $amountOfPets = $this->petRepository->countPets();

        return $this->engine->render('backend/dashboard/statistics/_amount_of_pets.html.twig', [
            'amountOfPets' => $amountOfPets,
        ]);
    }

    public static function getDefaultPriority(): int
    {
        return -1;
    }
}
