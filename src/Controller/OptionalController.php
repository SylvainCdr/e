<?php

namespace App\Controller;

use App\Repository\OptionalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OptionalController extends AbstractController
{
    #[Route('/optional', name: 'app_optional')]
    public function index(OptionalRepository $optionalRepo): Response
    {
        $results = $optionalRepo->findRoomByCapacityByOptional(2, 'Retroprojecteur', 'Hardware');
        dd($results);
        return $this->render('optional/index.html.twig', [
            'controller_name' => 'OptionalController',
        ]);
    }
}
