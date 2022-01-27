<?php

namespace ICS\BudgetmanagerBundle\Controller\Admin;

use ICS\BudgetmanagerBundle\Entity\Banque;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BanqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Banque::class;
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
