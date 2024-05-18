<?php

namespace App\Form;

use App\Entity\Animaux;
use App\Entity\ComptesRendus;
use App\Entity\Users;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ComptesRendusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('EtatAnimal')
            ->add('DetailEtat')
            ->add('TypeNourriture')
            ->add('GrammageNourriture')
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
                'choice_label' => 'id',
            ])
            ->add('User', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'role',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ComptesRendus::class,
        ]);
    }
}
