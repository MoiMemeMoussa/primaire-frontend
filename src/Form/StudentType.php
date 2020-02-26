<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, ['label' => "Prénom"])
            ->add('lastname', TextType::class, ['label' => "Nom"])
            ->add('birthdate', BirthdayType::class, ['label' => "Date de naissance"])
            ->add('place', TextType::class, ['label' => "Lieu de naissance"])
            ->add('father', TextType::class, ['label' => "Père"])
            ->add('mother', TextType::class, ['label' => "Mère"])
            ->add('gender')
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
