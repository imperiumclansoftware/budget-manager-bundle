<?php

namespace ICS\BudgetmanagerBundle\Controller\Admin;

use ICS\BudgetmanagerBundle\Entity\TypeCompte;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeCompteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeCompte::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
