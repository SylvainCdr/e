<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Room;
use App\Entity\Option;
use App\Entity\Status;
use App\Entity\Booking;
use App\Entity\EventType;
use App\Entity\TypeOption;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // On instancie Faker pour générer des données aléatoires en français
        $faker = Factory::create('fr_FR');

        // On crée un tableau contenant les noms des typeoptions
        $typeOptions = ['Software', 'Hardware', 'Ergonomie'];

        // On crée un tableau vide qui contiendra tous les objets TypeOption créés ici
        $objectTypeOptions = [];

        // On boucle sur chaque élément du tableau $typeOptions
        // pour créer un objet TypeOption et l'ajouter au tableau $objectTypeOptions
        // puis on persiste chaque objet TypeOption
        foreach ($typeOptions as $item) {
            $typeOption = new TypeOption();
            $typeOption->setName($item);
            $objectTypeOptions[] = $typeOption;
            $manager->persist($typeOption);
        }
        // dd($objectTypeOptions);

        // On crée un tableau vide qui contiendra tous les objets Option créés ici
        $objectOptions = [];

        // On boucle sur 30 éléments pour créer 30 objets Option
        // et les ajouter au tableau $objectOptions
        // puis on persiste chaque objet Option
        for ($i=0; $i < 30; $i++) { 
            $option = new Option();
            $option->setType($objectTypeOptions[rand(0, count($objectTypeOptions) - 1)]);
            $option->setName($faker->word());
            $option->setDescription($faker->sentence());
            //$option->setDescription($faker->sentence());
            $objectOptions[] = $option;
            $manager->persist($option);
        }

        


        $manager->flush();
    }
}
