<?php

namespace ICS\BudgetmanagerBundle\Form;

use App\Entity\Chequier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChequierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('chequier')
            ->add('dateChequier')
            ->add('debutNum')
            ->add('finNum')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chequier::class,
        ]);
    }
}