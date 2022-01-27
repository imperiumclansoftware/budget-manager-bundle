<?php

namespace ICS\BudgetmanagerBundle\Controller\Admin;

use ICS\BudgetmanagerBundle\Entity\Email;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EmailCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Email::class;
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
