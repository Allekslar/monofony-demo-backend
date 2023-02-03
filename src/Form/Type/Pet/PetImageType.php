<?php

declare(strict_types=1);

namespace Allekslar\MonofonyDemoBackendBundle\Form\Type\Pet;

use Allekslar\MonofonyDemoBackendBundle\Entity\Animal\PetImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class PetImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('file', FileType::class, [
                'label' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver
            ->setDefaults([
                'data_class' => PetImage::class,
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'app_pet_image';
    }
}
