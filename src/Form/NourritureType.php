<?php

namespace App\Form;

use App\Entity\Animaux;
use App\Entity\Nourriture;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class NourritureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Type')
            ->add('Quantite')
            ->add('DatePassage', null, [
                'widget' => 'single_text',
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
            ->add('Animal', EntityType::class, [
                'class' => Animaux::class,
                'choice_label' => 'Prenom',
                'multiple' => true,
            ])
            ->add('User', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'roles',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Nourriture::class,
        ]);
    }
}
