<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Room;
use App\Entity\Status;
use App\Entity\Booking;
use App\Entity\Optional;
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
        $objectOptionals = [];

        // On boucle sur 30 éléments pour créer 30 objets Option
        // et les ajouter au tableau $objectOptions
        // puis on persiste chaque objet Option
        for ($i=0; $i < 30; $i++) { 
            $optional = new Optional();
            $optional->setType($objectTypeOptions[rand(0, count($objectTypeOptions) - 1)]);
            $optional->setName($faker->word());
            $optional->setDescription($faker->sentence());
            //$option->setDescription($faker->sentence());
            $objectOptionals[] = $optional;
            $manager->persist($optional);
        }

           // On crée un tableau vide qui contiendra tous les objets Room créés ici
           $objectRooms = [];

           // On boucle sur 10 éléments pour créer 10 objets Room
           // et les ajouter au tableau $objectRooms
           // puis on persiste chaque objet Room
           for ($i=0; $i < 20; $i++) { 
               $room = new Room();
               $room->setName($faker->word());
               $room->setAddress($faker->address());
               $room->setCapacity($faker->numberBetween(1, 100));
               $room->setDayPrice($faker->randomFloat(2, 50, 500));
               $room->setIsRentable($faker->boolean());
               $room->setPicture('/images/salle_' . ($i + 1) . '.jpg');
               // On génère un nombre aléatoire entre 1 et 5
               // qui déterminera le nombre d'options à ajouter à la salle
               $max = rand(1, 5);
               // On crée un tableau vide qui contiendra les index des options à ajouter
               $k = [];
               // On boucle sur $max éléments pour ajouter $max options à la salle
               for ($j=0; $j < $max; $j++) { 
                   $nb = $faker->numberBetween(0, count($objectOptionals) - 1);
                   // Si l'index $nb n'est pas déjà présent dans le tableau $k
                   if (!in_array($nb, $k)) {
                       // On ajoute l'index $nb au tableau $k
                       $k[] = $nb;
                       // On ajoute l'option correspondant à l'index $nb à la salle
                       $room->addOptional($objectOptionals[$nb]);
                   }
               }
               // On ajoute la salle au tableau $objectRooms
               $objectRooms[] = $room;
               //persist
               // On persiste la salle
               $manager->persist($room);
           }
   
           $tabEvents = ['Séminaire', 'Réunion', 'Conférence', 'Formation', 'Soirée', 'Autre'];
           // On crée un tableau vide qui contiendra tous les objets EventType créés ici
           $objectEventTypes = [];
   
           // On boucle sur 5 éléments pour créer 5 objets EventType  
           // et les ajouter au tableau $objectEventTypes
           // puis on persiste chaque objet EventType
           for ($i=0; $i < count($tabEvents); $i++) { 
               $eventType = new EventType();
               $eventType->setName($tabEvents[$i]);
               $eventType->setDescription($faker->sentence());
               $objectEventTypes[] = $eventType;
               $manager->persist($eventType);
           }
   
           // On crée un tableau contenant les noms des typeoptions
           $tabStatus = ['Disponible', 'Pré-réservée', 'Réservée', 'Annulée'];
           $tabColors = ['primary', 'warning','success', 'danger'];
           // On crée un tableau vide qui contiendra tous les objets Status créés ici
           $objectStatus = [];
   
           // On boucle sur 4 éléments pour créer 4 objets Status
           // et les ajouter au tableau $objectStatus
           // puis on persiste chaque objet Status
           for ($i=0; $i < count($tabStatus); $i++) { 
               $status = new Status();
               $status->setName($tabStatus[$i])
               ->setColor($tabColors[$i]);
               $objectStatus[] = $status;
               $manager->persist($status);
           }
   
           // On crée un tableau vide qui contiendra tous les objets Booking créés ici
           $objectBookings = [];
   
           // On boucle sur 20 éléments pour créer 20 objets Booking
           // et les ajouter au tableau $objectBookings
           // puis on persiste chaque objet Booking
   
           for ($i=0; $i < 20; $i++) { 
               $booking = new Booking();
               $booking->setEventType($objectEventTypes[$faker->numberBetween(0, count($objectEventTypes) - 1)]);
               $booking->setStatus($objectStatus[$faker->numberBetween(0, count($objectStatus) - 1)]);
               $booking->setStartDate($faker->dateTimeBetween('+1 days', '+1 year'));
               $nbDays = rand(1, 10);
               $booking->setEndDate(date_add($booking->getStartDate(), date_interval_create_from_date_string($nbDays . " days")));
               $booking->setComment($faker->sentence());
               $booking->setRoom($objectRooms[$faker->numberBetween(0, count($objectRooms) - 1)]);
               $total = $booking->getRoom()->getDayPrice() * $nbDays;
               $booking->setTotalPrice($total);
               $objectBookings[] = $booking;
               $manager->persist($booking);
           }

        


        $manager->flush();
    }
}
