<?php

namespace App\Controller;   // CF Commentaires de EntrepriseController

use App\Entity\Employe;
use App\Repository\EmployeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeController extends AbstractController
{
    #[Route('/employe', name: 'app_employe')]
    public function index(EmployeRepository $employeRepository): Response
    {
        // $employes = $employeRepository->findAll(); // Pour afficher la liste de tout les employés

        // Pour afficher la liste de tout les employés classés par ordre alphabéthique selon le nom
        $employes = $employeRepository->findBy([], ["nom" => "ASC"]);

        return $this->render('employe/index.html.twig', [
            'employes' => $employes
        ]);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // FONCTION POUR AFFICHER LE DETAIL D'UN EMPLOYE

    #[Route('/employe/{id}', name: 'show_employe')]       // Reprendre la route en ajoutant /{id} à l'URL et en changeant le nom du name

    public function show(Employe $employe): Response      // Créer une fonction show() dans le controller pour afficher le détail d'un employé 

    {
        return $this->render('employe/show.html.twig', [  // Pour faire le lien entre le controller et la vue show.html.twig (il faut donc la créer dans le dossier employe)
            'employe' => $employe
        ]);
    }
}
