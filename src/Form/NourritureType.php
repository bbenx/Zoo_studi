<?php

namespace App\Form;

use App\Entity\Animaux;
use App\Entity\Nourriture;
use App\Entity\Users;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class NourritureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Animal', EntityType::class, [
            'class' => Animaux::class,
            'choice_label' => 'prenom',
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('a')
                ->orderBy('a.Prenom', 'ASC');
            },
            'placeholder' => 'Choisir un animal',
            'required' => true,
            ])
            ->add('type', TextType::class)
            ->add('quantite', IntegerType::class)
            ->add('datePassage', DateTimeType::class, [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('dateCreation', DateTimeType::class, [
                'widget' => 'single_text',
                'disabled' => true,
                'required' => false,
                'label' => 'Date de création',
            ])
            ->add('dateModification', DateTimeType::class, [
                'widget' => 'single_text',
                'disabled' => true,
                'required' => false,
                'label' => 'Date de modification',
            ])
            ->add('User', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'id',
                'attr' => [
                    'style' => 'display:none',
                ],
                'label_attr' => [
                    'style' => 'display:none',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Nourriture::class,
        ]);
    }
}
