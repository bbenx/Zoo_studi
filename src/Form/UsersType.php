<?php

namespace App\Form;

use App\Entity\Etablissement;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('roles', ChoiceType::class, [
                'choices' => [
                    'Employé' => 'ROLE_EMPLOYE',
                    'Vétérinaire' => 'ROLE_VETERINAIRE',
                ],
                'multiple' => true,
                'expanded' => true,
                'label' => 'Rôles',
            ])
            ->add('email')
            ->add('plainPassword', PasswordType::class, [
                'mapped' => false, // Important pour ne pas mapper directement à l'entité
                'required' => false,
                'label' => 'Mot de passe',
            ])
            ->add('creationDate', DateTimeType::class, [
                'widget' => 'single_text',
                'disabled' => true,
                'required' => false,
                'label' => 'Date de création',
            ])
            ->add('modificationDate', DateTimeType::class, [
                'widget' => 'single_text',
                'disabled' => true,
                'required' => false,
                'label' => 'Date de modification',
            ])
            ->add('Etablissement', EntityType::class, [
                'class' => Etablissement::class,
                'choice_label' => 'nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
