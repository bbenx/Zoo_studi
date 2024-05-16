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
            ->add('type')
            ->add('quantite')
            ->add('date_passage', NULL, [
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
            ->add('animal', EntityType::class, [
                'class' => Animaux::class,
                'choice_label' => 'id',
            ])
            ->add('user', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'id',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Nourriture::class,
        ]);
    }
}
