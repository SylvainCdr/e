<?php

namespace App\Controller\Admin;

use App\Entity\Optional;
use App\Entity\Room;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
<<<<<<< HEAD
=======
use App\Repository\OptionalRepository;
use App\Repository\OptionRepository;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
>>>>>>> c2d498a400fd3b993cf75313b153d32c4c3d48fa
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use Faker\Core\Number;

class RoomCrudController extends AbstractCrudController
{
<<<<<<< HEAD
    
=======

>>>>>>> c2d498a400fd3b993cf75313b153d32c4c3d48fa
    public static function getEntityFqcn(): string
    {
       
        return Room::class;
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
            IdField::new('id'),
        //  ImageField::new('picture'),
            TextField::new('name'),
            TextField::new('address'),
            NumberField::new('capacity'),
            NumberField::new('dayPrice'),
            BooleanField::new('isRentable'),
            ArrayField::new('optionals')
        ];
    }

}
