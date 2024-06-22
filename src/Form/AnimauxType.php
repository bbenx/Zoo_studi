<?php

namespace App\Form;

use App\Entity\Animaux;
use App\Entity\Habitats;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Prenom')
            ->add('Race')
            ->add('Image', UrlType::class, [
                'label' => 'Image URL',
                'required' => false,
            ])
            // ->add('creationDate', DateTimeType::class, [
            //     'widget' => 'single_text',
            //     'disabled' => true,
            //     'required' => false,
            //     'label' => 'Date de création',
            // ])
            // ->add('modificationDate', DateTimeType::class, [
            //     'widget' => 'single_text',
            //     'disabled' => true,
            //     'required' => false,
            //     'label' => 'Date de modification',
            // ])
            ->add('Habitat', EntityType::class, [
                'class' => Habitats::class,
                'choice_label' => 'nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animaux::class,
        ]);
    }
}
