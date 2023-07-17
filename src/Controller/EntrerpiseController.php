<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntrerpiseController extends AbstractController
{
    #[Route('/entrerpise', name: 'app_entrerpise')]
    public function index(): Response
    {
        return $this->render('entrerpise/index.html.twig', [
            'controller_name' => 'EntrerpiseController',
        ]);
    }
}
