<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Booking;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Booking>
 *
 * @method Booking|null find($id, $lockMode = null, $lockVersion = null)
 * @method Booking|null findOneBy(array $criteria, array $orderBy = null)
 * @method Booking[]    findAll()
 * @method Booking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Booking::class);
    }

   /**
    * @return count of Bookings - Returns an integer
    */
    public function countBookingsByOwner(User $user): int
    {
 
             $bookings = $this->createQueryBuilder('b')
             ->andWhere('b.user = :user')
             ->setParameter('user', $user)
             ->orderBy('b.startDate', 'DESC')
             ->orderBy('b.status', 'ASC')
             ->getQuery()
             ->getResult()
         ;
         
               
        return count($bookings);
    }

//    public function findOneBySomeField($value): ?Booking
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
