<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Form\ProfilType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function new(Request $request): Response
    {
        // just set up a fresh $task object (remove the example data)
        $profil = new Participant();

        $form = $this->createForm(ProfilType::class, $profil);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $profil = $form->getData();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('profil_success');
        }

        return $this->renderForm('profil.html.twig', [
            'form' => $form,
        ]);
    }
}
