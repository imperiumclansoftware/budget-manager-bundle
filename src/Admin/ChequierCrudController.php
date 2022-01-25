<?php

namespace ICS\BudgetmanagerBundle\Controller\Admin;

use ICS\BudgetmanagerBundle\Entity\banque\Chequier;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChequierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chequier::class;
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
