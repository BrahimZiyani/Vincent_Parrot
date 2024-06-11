<?php

namespace App\Form;

use App\Entity\Schedule;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('monday', null, [
                'widget' => 'single_text',
            ])
            ->add('tuesday', null, [
                'widget' => 'single_text',
            ])
            ->add('wednesday', null, [
                'widget' => 'single_text',
            ])
            ->add('thursday', null, [
                'widget' => 'single_text',
            ])
            ->add('friday', null, [
                'widget' => 'single_text',
            ])
            ->add('saturday', null, [
                'widget' => 'single_text',
            ])
            ->add('sunday', null, [
                'widget' => 'single_text',
            ])
            ->add('organiser', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Schedule::class,
        ]);
    }
}
