<?php

namespace App\Form;

use App\Entity\Restaurant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class RestaurantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du restaurant',
                'attr' => [
                    'placeholder' => 'Ex: Mongoo Châtelet',
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un nom pour le restaurant',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le nom doit contenir au moins {{ limit }} caractères',
                        'max' => 255,
                    ]),
                ],
            ])
            ->add('location', TextType::class, [
                'label' => 'Adresse du restaurant',
                'attr' => [
                    'placeholder' => 'Ex: 23 Rue de Rivoli, 75004 Paris',
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer une adresse pour le restaurant',
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'L\'adresse doit contenir au moins {{ limit }} caractères',
                        'max' => 255,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Restaurant::class,
        ]);
    }
}