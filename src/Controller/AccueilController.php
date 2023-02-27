<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SearchForm;
use App\Repository\SortieRepository;
use App\Service\SearchData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{

    #[Route('/accueil', name: 'app_accueil')]
    public function index(SortieRepository $sortieRepository, Request $request): Response
    {
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $sorties = $sortieRepository->findByFilter($data);

        return $this->render('accueil/accueil.html.twig', [
            'sorties' => $sorties,
            'search'=>$form->createView()
        ]);
    }
}
