<?php

namespace ICS\BudgetmanagerBundle\Controller\Admin;

use ICS\BudgetmanagerBundle\Entity\InfoCompte;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class InfoCompteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InfoCompte::class;
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
