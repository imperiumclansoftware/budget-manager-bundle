<?php

namespace ICS\BudgetmanagerBundle\Form;

use App\Entity\AgenceBanque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AgenceBanqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('agence')
            ->add('cp')
            ->add('ville')
            ->add('typeCompte')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AgenceBanque::class,
        ]);
    }
}
