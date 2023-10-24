<?php

namespace App\Form;

use App\Entity\Optional;
use App\Entity\TypeOption;
use Symfony\Component\Form\AbstractType;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SearchFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('motCles', SearchType::class,
            [
                'label'=> 'Entrez un mot clés',
                'attr'=>[
                    
                  
                    'placeholder'=>'Entrez un Mots clès',
                    'class'=> 'border-2 border-warning'
                    
                ],
                'required'=>false,

            ])

            ->add('capacity', IntegerType::class, [
                
                'label'=> 'Nombre de perssones',
                'attr'=>[
                    
                  
                    'placeholder'=>'Entrez un Mots clès',
                    'class'=> 'border-2 border-warning'
                    
                ],
                 
                   
                
                'required'=>false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
