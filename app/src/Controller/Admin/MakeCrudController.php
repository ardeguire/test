<?php

namespace App\Controller\Admin;

use App\Entity\Make;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class MakeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Make::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            AssociationField::new('models'),
        ];
    }
    
}
