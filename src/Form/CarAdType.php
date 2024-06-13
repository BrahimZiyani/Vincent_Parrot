<?php

namespace App\Form;

use App\Entity\CarAd;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class CarAdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand', TextType::class)
            ->add('price', NumberType::class)
            ->add('gearbox', TextType::class)
            ->add('energy', TextType::class)
            ->add('fuel', TextType::class)
            ->add('year', TextType::class)
            ->add('picture', FileType::class, [
                'label' => 'Car Picture (JPEG or PNG file)',
                'mapped' => false,
                'required' => false,
            ])
            ->add('description', TextareaType::class)
            ->add('mileage', TextareaType::class)
            ->add('manager', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.roles LIKE :role')
                        ->setParameter('role', '%ROLE_MANAGER%');
                },
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CarAd::class,
        ]);
    }
}
