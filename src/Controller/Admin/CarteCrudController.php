<?php

namespace ICS\BudgetmanagerBundle\Controller\Admin;

use ICS\BudgetmanagerBundle\Entity\Carte;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CarteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Carte::class;
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
