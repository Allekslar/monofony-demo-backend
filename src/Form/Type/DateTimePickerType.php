<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateTimePickerType extends AbstractType
{
    public function getParent()
    {
        return DateType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'widget' => 'single_text',
            'format' => 'dd/MM/yyyy H:i',
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_date_time_picker';
    }
}
