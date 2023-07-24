<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('raisonSociale', TextType::class)                 // Définir les types de champs et importer les classes
            ->add('dateCreation', DateType::class)                  // CF Propriétés BootStrap dans l'entité Employe
            ->add('adresse', TextType::class)
            ->add('cp', TextType::class)                        
            ->add('ville', TextType::class)
            ->add('valider', SubmitType::class, [                   // Ajouter directement le bouton submit ici
            'attr' =>['class' => 'btn btn-success']])               // Ajouter après class ['attr' =>['class' =>'btn btn-succes']] Pour améliorer le bouton
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
