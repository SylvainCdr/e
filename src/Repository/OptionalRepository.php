<?php

namespace App\Repository;


use App\Entity\Room;
use App\Entity\Optional;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Optional>
 *
 * @method Optional|null find($id, $lockMode = null, $lockVersion = null)
 * @method Optional|null findOneBy(array $criteria, array $orderBy = null)
 * @method Optional[]    findAll()
 * @method Optional[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Optional::class);
    }

    // select * from optional AS o
    // join TypeOption AS t ON t.id=o.type
    // join Room AS t ON r.id=o.rooms
    // WHERE t.name='Software'
    // AND r.capacity>50
    // AND o.name='% pack %'
    /**
    * @return Optionals[] Returns an array of Optional objects
    */
    public function findRoomByCapacityByOptional(int $capacity, string $motCle, string $groupe): array
    {
        $opt = $this->createQueryBuilder('o')
        ->distinct()
        ->where('o.name= :motCle')
        ->setParameter('motCle', $motCle)
        ->innerJoin('o.rooms', 'r')
        ->andWhere('r.capacity> :capacity')
        ->setParameter('capacity', $capacity)
        ->innerJoin('o.type', 't')
        ->andWhere('t.name= :groupe')
        ->setParameter('groupe', $groupe)
        ->getQuery()
        ->getResult()
    ;

    return $opt;
    }


                  /**
    * @return Optionals[] Returns an array of Options objects
    */
    public function findOptionsByRoom(Room $room): array
    {
        $roomOptions = $this->createQueryBuilder('o')
        ->andWhere('o.id = :roomId')
        ->setParameter('roomId', $room->getId())
        ->groupBy('o.type')
        ->orderBy('o.name', 'ASC')
        ->getQuery()
        ->getResult()
    ;

    return $roomOptions;
    }


}
