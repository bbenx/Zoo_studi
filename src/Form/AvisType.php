<?php

namespace App\Form;

use App\Entity\Avis;
use App\Entity\Etablissement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SecurityBundle\Security as SecurityBundleSecurity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Core\Security;

class AvisType extends AbstractType
{
    private $security;

    public function __construct(SecurityBundleSecurity $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
            
        if ($this->security->isGranted('ROLE_EMPLOYE')) {
            $builder
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
                ])
                ->add('statut', ChoiceType::class, [
                    'choices' => [
                        'En attente' => 'en attente',
                        'Validé' => 'validé',
                ]]);
        }
        else {
            $builder
            ->add('Pseudo', TextType::class, [
                 'attr' => ['maxlength' => 10],
            ])
            ->add('Commentaire', TextareaType::class,[
                'label' => 'Partagez votre expérience concernant le zoo',
                'attr' => ['maxlength' => 130],
            ]);
        }
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
