<?php

namespace ICS\BudgetmanagerBundle\Controller\Admin;

use ICS\BudgetmanagerBundle\Entity\Solde;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SoldeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Solde::class;
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
