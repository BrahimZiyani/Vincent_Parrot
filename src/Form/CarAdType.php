<?php

namespace App\Form;

use App\Entity\CarAd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarAdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand')
            ->add('price')
            ->add('gearbox')
            ->add('energy')
            ->add('fuel')
            ->add('year', null, [
                'widget' => 'single_text',
            ])
            ->add('picture')
            ->add('description')
            ->add('mileage')
            ->add('manager_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarAd::class,
        ]);
    }
}
