<?php

namespace App\Controller;                                       // Grâce à la commande Symfony le contrôlleur se créer automatiquement

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EntrerpiseController extends AbstractController           // Permet d'accéder à des méthodes pré-établies dans l'AbstractController
{                                                        
    #[Route('/entrerpise', name: 'app_entrerpise')]             // Route représentant l'URL pour la redirection Veiller à ce que tout les name: soient différents
    public function index(): Response                   
    {
        return $this->render('entrerpise/index.html.twig', [    // render() Permet de faire le lien entre le controller et la view
            'controller_name' => 'EntrerpiseController',        // Renvoi dans le dossier entreprise, dans le fichier index.html.twig
        ]);
    }
}
