<?php

namespace App\Form;

use App\Entity\Employee;
use App\Entity\Restaurant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de l\'employé',
                'attr' => [
                    'placeholder' => 'Ex: Jean Dupont',
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un nom pour l\'employé',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le nom doit contenir au moins {{ limit }} caractères',
                        'max' => 255,
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email de l\'employé',
                'attr' => [
                    'placeholder' => 'Ex: jean.dupont@mongoo.fr',
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un email pour l\'employé',
                    ]),
                    new Email([
                        'message' => 'Veuillez entrer un email valide',
                    ]),
                ],
            ])
            ->add('active', CheckboxType::class, [
                'label' => 'Employé actif',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input'
                ],
                'label_attr' => [
                    'class' => 'form-check-label'
                ],
            ])
            ->add('restaurant', EntityType::class, [
                'class' => Restaurant::class,
                'choice_label' => 'name',
                'label' => 'Restaurant',
                'placeholder' => 'Sélectionnez un restaurant',
                'attr' => [
                    'class' => 'form-select'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez sélectionner un restaurant',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employee::class,
        ]);
    }
}