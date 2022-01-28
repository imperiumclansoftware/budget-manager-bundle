<?php

namespace ICS\BudgetmanagerBundle\Form;

use App\Entity\InfoCompte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InfoCompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cleEtablissement')
            ->add('guichet')
            ->add('numCompte')
            ->add('cleRice')
            ->add('domiciliation')
            ->add('bic')
            ->add('iban')
            ->add('chequier')
            ->add('categorie')
            ->add('solde')
            ->add('carte')
            ->add('banque')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InfoCompte::class,
        ]);
    }
}
