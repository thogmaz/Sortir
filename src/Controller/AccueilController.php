<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\AccueilFormType;
use App\Repository\SortieRepository;
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
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $sorties = $this->sortieRepository->findAll();
        $search = new Sortie();
        $form = $this->createForm(AccueilFormType::class, $search);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $sorties = $this->sortieRepository->findByFilter($search);

        }

        return $this->render('accueil/accueil.html.twig', [
            'sorties' => $sorties,
            'search'=>$form->createView()
        ]);
    }
}
