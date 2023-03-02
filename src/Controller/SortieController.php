<?php

namespace App\Controller;

use App\Entity\Etat;
use App\Entity\Sortie;
use App\Form\SortieFormType;
use App\Repository\EtatRepository;
use App\Repository\SortieRepository;
use App\Service\SortieData;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Time;

class SortieController extends AbstractController
{
    #[Route('/sortie', name: 'app_sortie')]
    public function create(SortieRepository $sortieRepository, Request $request, EntityManagerInterface $entityManager, EtatRepository $etatRepository): Response
    {
        $data = new Sortie();
        $data->setCampus($this->getUser()->getCampus());
        $form = $this->createForm(SortieFormType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password


            if ($request->request->get('save')) {
                $etat = $etatRepository->findOneBy(['libelle'=>'crée']);
            }
            else if ($request->request->get('publish')){
                $etat = $etatRepository->findOneBy(['libelle'=>'ouverte']);
            }

            $data->setEtat($etat);

            $data->setOrganisateur($this->getUser());

            $entityManager->persist($data);
            $entityManager->flush();

            return $this->redirectToRoute('app_accueil');
        }
        return $this->render('sortie/sortie.html.twig', [

            'sortieData' => $form->createView()
        ]);
    }
}
