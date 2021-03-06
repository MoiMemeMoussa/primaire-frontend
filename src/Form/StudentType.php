<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, ['label' => "Prénom"])
            ->add('lastName', TextType::class, ['label' => "Nom"])
            ->add('birthDate', DateType::class, [
                'label' => "Date de naissance",
                'input' => 'string',
                'years' => range(date('Y') - 100, date('Y') - 10)
            ])
            ->add('place', TextType::class, ['label' => "Lieu de naissance"])
            ->add('father', TextType::class, ['label' => "Père"])
            ->add('mother', TextType::class, ['label' => "Mère"])
            ->add('gender', ChoiceType::class, [
                'label' => "Genre",
                'expanded' => true,
                'multiple' => false,
                'choices'  => [
                    'M' => "MASCULIN",
                    'F' => "FEMININ",
                ]
            ])
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
