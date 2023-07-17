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
        $name = 'Elan Formation';                               // CF VAR
        $tableau = ["valeur1", "valeur2"];                      // Pour afficher un tableau il faut faire une boucle

        return $this->render('entrerpise/index.html.twig', [    // render() Permet de faire le lien entre le controller et la view // Renvoi dans le dossier entreprise, dans le fichier index.html.twig
            
            //'controller_name' => 'Entrerpise Controller',     // 'controller_name' est un argument - 'EntrepriseController' est une valeur
            
            'name' => $name,                                    // CF VAR
            
            'tableau' => $tableau
        ]);                                                     
    }  

}               // Pour afficher cet argument dans une vue il faut créer un echo représenté par {{ }} dans le fichier index.html.twig du dossier entreprise
//              Il faut également saisir le nom de la Route (à savoir /entreprise) dans l'URL du navigateur à la suite de http://127.0.0.1:8000 (lorsque celui-ci est activé)

//              VAR Avec cette méthode, il est également possible de faire passer une variable: $variable = 'Entreprise Controller';
//                                                                                                   'controller_name' => $variable