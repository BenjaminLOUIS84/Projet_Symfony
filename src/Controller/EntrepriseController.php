<?php

namespace App\Controller;                                       // Grâce à la commande Symfony le contrôlleur se créer automatiquement

use App\Form\EntrepriseType;                                    // BDD Obtenue grâce au click droit import class
use Symfony\Component\HttpFoundation\Request;                   // BDD Obtenue grâce au click droit import class
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Entreprise;                                      // BDD Obtenue grâce au click droit import class
use App\Repository\EntrepriseRepository;                        // BDD Obtenue grâce au click droit import class
use Doctrine\ORM\EntityManagerInterface;                        // BDD Obtenue grâce au click droit import class

class EntrepriseController extends AbstractController           // Permet d'accéder à des méthodes pré-établies dans l'AbstractController
{                                                        
    #[Route('/entreprise', name: 'app_entreprise')]             // Route représentant l'URL pour la redirection Veiller à ce que tout les name: soient différents
    //                                                             Le name: sert pour la navigation

    // public function index(EntityManagerInterface $entityManager): Response   // BDD EntityManagerInterface $entityManager à renseigner dans la fonction index()
    //                                                                             BDD Clique droit->Import class pour importer cette classe dans le contrôlleur
    public function index(EntrepriseRepository $entrepriseRepository): Response // ASTUCE 

    {                                                          
        // $name = 'Elan Formation';                               // CF VAR
        // $tableau = ["valeur1", "valeur2"];                      // Pour afficher un tableau il faut faire une boucle TAB

        // $entreprises = $entityManager->getRepository(Entreprise::class)->findAll();  // CF BDD Récupérer la liste de toute les entreprises
        
        // $entreprises = $entrepriseRepository->findAll();        // CF ASTUCE Récupérer la liste de toute les entreprises
        // $entreprises = $entrepriseRepository->findBy([], ["raisonSociale" => "ASC"]); // Pour afficher la liste de toute les entreprises classées par ordre alphabéthique selon la raison sociale
        // $entreprises = $entrepriseRepository->findBy(["ville" => "Strasbourg"], ["raisonSociale" => "ASC"]); // Pour afficher la liste des entreprises de Strasbourg classée par ordre alphabéthique selon la raison sociale
        
        $entreprises = $entrepriseRepository->findBy([], ["raisonSociale" => "ASC"]); // Pour afficher la liste des entreprises de Strasbourg classée par ordre alphabéthique selon la raison sociale

        return $this->render('entreprise/index.html.twig', [      // render() Permet de faire le lien entre le controller et la view // Renvoi dans le dossier entreprise, dans le fichier index.html.twig
            
            // 'controller_name' => 'Entreprise Controller',      // 'controller_name' est un argument - 'EntrepriseController' est une valeur
            // 'name' => $name,                                   // CF VAR
            // 'tableau' => $tableau,                             // CF TAB

            'entreprises' => $entreprises                         // CF BDD

        ]);                                                     
    }  

    // Pour afficher cet argument dans une vue il faut créer un echo représenté par {{ }} dans le fichier index.html.twig du dossier entreprise
    //              Il faut également saisir le nom de la Route (à savoir /entreprise) dans l'URL du navigateur à la suite de http://127.0.0.1:8000 (lorsque celui-ci est activé)

    //              VAR Avec cette méthode, il est également possible de faire passer une variable: $variable = 'Entreprise Controller';
    //                                                                                                   'controller_name' => $variable

    //              BDD Afficher les valeurs de la base de données à savoir la liste des entreprises et des employés (doctrine fait le lien entre la BDD et le projet)

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // FONCTION POUR AFFICHER UN FORMULAIRE POUR LES ENTREPRISES

    #[Route('/entreprise/new', name: 'new_entreprise')]         // Reprendre la route en ajoutant /new à l'URL et en changeant le nom du name (Ajouter une entreprise)
    #[Route('/entreprise/{id}/edit', name: 'edit_entreprise')]  // Reprendre la route en ajoutant /{id}/edit à l'URL et en changeant le nom du name (Editer une entreprise)

    // public function new(Request $request, EntityManagerInterface $entityManager): Response // Créer une fonction new() dans le controller pour créer le formulaire dédié aux entreprises 
    
    public function new_edit(Entreprise $entreprise = null, Request $request, EntityManagerInterface $entityManager): Response // Modifier cette fonction new()pour permet l'ajout ou l'édition d'une entreprise (paramConverter)

    {
    if(!$entreprise){                                           // S'il n'y pas d'entreprise alors créer une nouvelle sinon...reprendre reprendre les informations pour les éditers
                                                  
        $entreprise = new Entreprise();                         // Après avoir importé la classe Request Déclarer une nouvelle entrprise
        }

        $form = $this->createForm(EntrepriseType :: class, $entreprise);  // Créer un nouveau formulaire avec la méthode createForm() et importer le classe EntrepriseType

        //////////////////////////////////////////////////////////////////////////
        //                                                                  GERER LE TRAITEMENT EN BDD
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {         // Si le formulaire soumis est valide alors
            
            $entreprise = $form->getData();                     // Récupérer les informations de la nouvelle entreprise 
            //prepare PDO
            $entityManager->persist($entreprise);               // Dire à Doctrine que je veux sauvegarder la nouvelle entreprise           
            //execute PDO
            $entityManager->flush();                            // Mettre la nouvelle entreprise dans la BDD

            return $this->redirectToRoute('app_entreprise');    // Rediriger vers la liste des entreprises
        }

        //////////////////////////////////////////////////////////////////////////

        return $this->render('entreprise/new.html.twig', [      // Pour faire le lien entre le controller et la vue new.html.twig (il faut donc la créer dans le dossier entreprise)
            'formAddEntreprise' => $form,
            'edit' => $entreprise->getId()
        ]);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // FONCTION POUR AFFICHER LE DETAIL D'UNE ENTREPRISE

    #[Route('/entreprise/{id}', name: 'show_entreprise')]        // Reprendre la route en ajoutant /{id} à l'URL et en changeant le nom du name

    public function show(Entreprise $entreprise): Response       // Créer une fonction show() dans le controller pour afficher le détail d'une entreprise 

    {
        return $this->render('entreprise/show.html.twig', [      // Pour faire le lien entre le controller et la vue show.html.twig (il faut donc la créer dans le dossier entreprise)
            'entreprise' => $entreprise
        ]);
    }

}
