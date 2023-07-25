<?php

namespace App\Form;

use App\Entity\Employe;
use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)                                               // Définir les types de champs et importer les classes
            
            ->add('prenom', TextType::class, [
            'attr' =>['class' =>'form-control']])                                       // Ajouter après class ['attr' =>['class' =>'form-control']] Propiété BootStrap pour améliorer l'affichage du texte

            ->add('dateNaissance', DateType::class)                                     // Ajouter après class ['widget' => 'single_text', 'attr' =>['class' =>'form-control']] Propiété BootStrap pour améliorer l'affichage de la date                                                                     
            
            ->add('dateEmbauche', DateType::class, [
            'widget' => 'single_text', 'attr' =>['class' =>'form-control']]) 
            
            ->add('ville', TextType::class, [
                 
            ])

            
            ->add('entreprise', EntityType::class, [
            'class' => Entreprise::class, 
            'attr' => ['class' => 'form-control'],
            'choice_label' => 'raisonSociale'])                                         // Particlarité ici le type à besoin d'un tableau d'arguments pour fonctionner
            
            ->add('valider', SubmitType::class, [                                       // Ajouter directement le bouton submit ici
            'attr' =>['class' => 'btn btn-success']])                                   // Ajouter après class ['attr' =>['class' =>'btn btn-succes']] Pour améliorer le bouton
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Employe::class,
        ]);
    }
}
