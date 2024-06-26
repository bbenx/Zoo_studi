<?php

namespace App\Form;

use App\Entity\Etablissement;
use App\Entity\Habitats;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;

class HabitatsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('Description')
            ->add('Image', UrlType::class, [
                'label' => 'Image URL',
                'required' => false,])
            // ->add('creationDate', DateTimeType::class, [
            //     'widget' => 'single_text',
            //     'disabled' => true,
            //     'required' => false,
            //     'label' => 'Date de création',
            // ]);
            // // ->add('modificationDate', DateTimeType::class, [
            // //     'widget' => 'single_text',
            // //     'disabled' => true,
            // //     'required' => false,
            // //     'label' => 'Date de modification',
            // // ])
            ->add('Etablissement', EntityType::class, [
                'class' => Etablissement::class,
                'choice_label' => 'nom',
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Habitats::class,
        ]);
    }
}
