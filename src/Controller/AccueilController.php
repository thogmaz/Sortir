<?php

namespace App\Controller;

use App\Form\AccueilFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // just set up a fresh $task object (remove the example data)
        $sortie = $this->getUser();

        $form = $this->createForm(AccueilFormType::class, $sortie);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($sortie);
            $entityManager->flush();


            return $this->redirectToRoute('accueil_success');
        }

        return $this->renderForm('accueil/accueil.html.twig', [
            'accueilForm' => $form
        ]);
    }
}
