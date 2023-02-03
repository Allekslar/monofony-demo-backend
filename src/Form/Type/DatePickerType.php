<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DatePickerType extends AbstractType
{
    public function getParent(): string
    {
        return DateType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'format' => 'dd/MM/yyyy',
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'app_date_picker';
    }
}
