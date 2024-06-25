<?php

namespace App\Form;

use App\Entity\Etablissement;
use App\Entity\Horaires;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HorairesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Lundi')
            ->add('Mardi')
            ->add('Mercredi')
            ->add('Jeudi')
            ->add('Vendredi')
            ->add('Samedi')
            ->add('Dimanche')
            ->add('idEtablissement', EntityType::class, [
                'class' => Etablissement::class,
                'choice_label' => 'nom',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Horaires::class,
        ]);
    }
}
