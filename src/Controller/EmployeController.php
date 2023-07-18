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

        // $employes = $employeRepository->findAll();

        // Pour afficher la liste de tout les employés classés par ordre alphabéthique selon le nom
        $employes = $employeRepository->findBy([], ["nom" => "ASC"]);

        // Pour afficher la liste des employés de l'entreprise DEV COOK classés par ordre alphabéthique selon le nom
        $employes = $employeRepository->findBy(["entreprise" => "2"], ["nom" => "ASC"]); 

        return $this->render('employe/index.html.twig', [

            'employes' => $employes

        ]);
    }
}
