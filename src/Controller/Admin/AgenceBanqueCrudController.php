<?php

namespace ICS\BudgetmanagerBundle\Controller\Admin;

use ICS\BudgetmanagerBundle\Entity\banque\AgenceBanque;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AgenceBanqueCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AgenceBanque::class;
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
