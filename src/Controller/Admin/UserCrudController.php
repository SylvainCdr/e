<?php

namespace App\Controller\Admin;

use App\Entity\User;
<<<<<<< HEAD
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
=======

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
>>>>>>> c2d498a400fd3b993cf75313b153d32c4c3d48fa
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;

class UserCrudController extends AbstractCrudController
{
<<<<<<< HEAD
    
=======

>>>>>>> c2d498a400fd3b993cf75313b153d32c4c3d48fa
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureActions(Actions $actions): Actions
<<<<<<< HEAD
    {
        return $actions
            // ...
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER)
        ;
    }
    /*
=======
{
    return $actions
        // ...
        ->add(Crud::PAGE_INDEX, Action::DETAIL)
        ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER)
    ;
}
    

>>>>>>> c2d498a400fd3b993cf75313b153d32c4c3d48fa
    public function configureFields(string $pageName): iterable
    {
        return [
          
            EmailField::new('email'),
            TextField::new('name'),
            TextField::new('address'),
            TextField::new('phone'),
            TextField::new('serial'),
            ArrayField::new('roles'),

        ];
    }

}
