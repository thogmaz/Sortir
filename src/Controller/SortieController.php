<?php

namespace App\Controller;

use App\Form\SearchForm;
use App\Form\SortieFormType;
use App\Repository\SortieRepository;
use App\Service\SearchData;
use App\Service\SortieData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    #[Route('/sortie', name: 'app_sortie')]
    public function index(SortieRepository $sortieRepository, Request $request): Response
    {
        $data = new SortieData();
        $data->campus = $this->getUser()->getCampus();
        $form = $this->createForm(SortieFormType::class, $data);
        $form->handleRequest($request);

        return $this->render('sortie/sortie.html.twig', [
            'sortieData'=>$form->createView()
        ]);
    }
}