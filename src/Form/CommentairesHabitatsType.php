<?php

namespace App\Form;

use App\Entity\CommentairesHabitats;
use App\Entity\Habitats;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;


class CommentairesHabitatsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('habitat', EntityType::class,[
                'class' => 'Nom',
            ])
            ->add('avis')
            ->add('etat', ChoiceType::class,[
                'choices' => [
                    'Très bon' => 'Très bon',
                    'Bon' => 'Bon',
                    'Satisfaisant' => 'Satisfaisant'
                ],
                'placeholder' => 'Sélectionnez une option',
                'label' => 'Etat',
                'required' => true,
            ])
            ->add('amelioration', ChoiceType::class,[
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                ],
                'placeholder' => 'Sélectionnez une option',
                'label' => 'Amélioration',
                'required' => true,
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
            ->add('habitat', EntityType::class, [
                'class' => Habitats::class,
                'choice_label' => 'Nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CommentairesHabitats::class,
        ]);
    }
}
