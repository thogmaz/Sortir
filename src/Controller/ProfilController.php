<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ProfilType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // just set up a fresh $task object (remove the example data)
        $profil = $this->getUser();

        $form = $this->createForm(ProfilType::class, $profil);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($profil);
            $entityManager->flush();


            return $this->redirectToRoute('profil_success');
        }

        return $this->renderForm('profil/profil.html.twig', [
            'profilForm' => $form,
        ]);
    }
}
