<?php

namespace ICS\BudgetmanagerBundle\Controller\Admin;

use ICS\BudgetmanagerBundle\Entity\Telephone;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TelephoneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Telephone::class;
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
