<?php

namespace App\Controller;                                       // Grâce à la commande Symfony le contrôlleur se créer automatiquement

use App\Entity\Entreprise;                                      //BDD Obtenue grâce au click droit import class
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;                        // BDD Obtenue grâce au click droit import class

class EntrepriseController extends AbstractController           // Permet d'accéder à des méthodes pré-établies dans l'AbstractController
{                                                        
    #[Route('/entreprise', name: 'app_entreprise')]             // Route représentant l'URL pour la redirection Veiller à ce que tout les name: soient différents
    public function index(EntityManagerInterface $entityManager): Response                   
    {                                                           // BDD EntityManagerInterface $entityManager à renseigner dans la fonction index()
        //                                                         BDD Clique droit->Import class pour importer cette classe dans le contrôlleur
        
        //$name = 'Elan Formation';                               // CF VAR
        //$tableau = ["valeur1", "valeur2"];                      // Pour afficher un tableau il faut faire une boucle TAB

        $entreprises = $entityManager->getRepository(Entreprise::class)->findAll();  // CF BDD Récupérer la liste de toute les entreprises

        return $this->render('entrepise/index.html.twig', [    // render() Permet de faire le lien entre le controller et la view // Renvoi dans le dossier entreprise, dans le fichier index.html.twig
            
            // 'controller_name' => 'Entreprise Controller',       // 'controller_name' est un argument - 'EntrepriseController' est une valeur
            // 'name' => $name,                                    // CF VAR
            // 'tableau' => $tableau,                              // CF TAB

            'entreprises' => $entreprises                       // CF BDD

        ]);                                                     
    }  

}               // Pour afficher cet argument dans une vue il faut créer un echo représenté par {{ }} dans le fichier index.html.twig du dossier entreprise
//              Il faut également saisir le nom de la Route (à savoir /entreprise) dans l'URL du navigateur à la suite de http://127.0.0.1:8000 (lorsque celui-ci est activé)

//              VAR Avec cette méthode, il est également possible de faire passer une variable: $variable = 'Entreprise Controller';
//                                                                                                   'controller_name' => $variable

//              BDD Afficher les valeurs de la base de données à savoir la liste des entreprises et des employés (doctrine fait le lien entre la BDD et le projet)