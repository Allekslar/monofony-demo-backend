<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Form\Extension;

use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateTypeExtension extends AbstractTypeExtension
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'widget' => 'single_text',
                'html5' => false,
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        return [DateType::class];
    }
}
