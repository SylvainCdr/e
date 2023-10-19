<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use App\Repository\BookingRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
    #[Route('/userDashboard', name: 'app_userDashboard')]
    public function dashboard(BookingRepository $bookingRepository, RoomRepository $rRepo): Response
    {
        $aRooms = $rRepo->findAll();
        $countBookings = $bookingRepository->countBookingsByOwner($this->getUser());
        return $this->render('page/userDashboard.html.twig', [
            'aRooms' => $aRooms,
            'countBookings' => $countBookings,
            'controller_name' => 'PageController',
            'user' => $this->getUser(),
        ]);
    }
}
