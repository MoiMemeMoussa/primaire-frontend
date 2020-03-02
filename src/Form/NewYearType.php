<?php

namespace App\Form;

use App\Entity\Annee;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\View\ChoiceView;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewYearType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Annee_scolaire', EntityType::class, [
                'class' => Annee::class,
                'choice_label' => 'value',
                'mapped' => false
            ])
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'empty_data' => '',
        ]);
    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $newChoice = new ChoiceView(array(), 'add', 'Nouvelle année');

        array_unshift($view->children['Annee_scolaire']->vars['choices'], $newChoice);
    }
}
