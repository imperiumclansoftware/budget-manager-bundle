<?php

namespace ICS\BudgetmanagerBundle\Controller\Admin;

use ICS\BudgetmanagerBundle\Entity\Adress;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AdressCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Adress::class;
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
