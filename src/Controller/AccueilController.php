<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\AccueilFormType;
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
    private $sortieRepository;

    public function __construct(SortieRepository $sortieRepository)
    {
        $this->sortieRepository = $sortieRepository;
    }


    #[Route('/accueil', name: 'app_accueil')]
    public function index(Request $request): Response
    {
        $sorties = $this->sortieRepository->findAll();
        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $sorties = $this->sortieRepository->findByFilter($data);

        }

        return $this->render('accueil/accueil.html.twig', [
            'data' => $data,
            'search'=>$form->createView()
        ]);
    }
}
