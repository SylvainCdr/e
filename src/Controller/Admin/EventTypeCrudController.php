<?php

namespace App\Controller\Admin;


use App\Entity\EventType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
<<<<<<< HEAD
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
=======
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
>>>>>>> c2d498a400fd3b993cf75313b153d32c4c3d48fa
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EventTypeCrudController extends AbstractCrudController
{
<<<<<<< HEAD
    
=======

>>>>>>> c2d498a400fd3b993cf75313b153d32c4c3d48fa
    public static function getEntityFqcn(): string
    {
        return EventType::class;
    }
<<<<<<< HEAD
    
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->add(Crud::PAGE_EDIT, Action::SAVE_AND_ADD_ANOTHER)
        ;
    }
    /*
=======

    public function configureActions(Actions $actions): Actions
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
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    
}
