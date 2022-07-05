<?php

namespace App\Controller\Admin;

use App\Entity\SaveMessages;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SaveMessagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SaveMessages::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('title'),
            TextField::new('message'),
        ];
    }

}
