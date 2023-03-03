<?php

namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieFormType;
use App\Repository\EtatRepository;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    #[Route('/sortie', name: 'app_sortie')]
    public function create(Request $request, EntityManagerInterface $entityManager, EtatRepository $etatRepository): Response
    {
        $data = new Sortie();
        $data->setCampus($this->getUser()->getCampus());
        $data->setOrganisateur($this->getUser());

        $form = $this->createForm(SortieFormType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($request->request->get('save')) {
                $etat = $etatRepository->findOneBy(['libelle'=>'crée']);
            }
            else if ($request->request->get('publish')){
                $etat = $etatRepository->findOneBy(['libelle'=>'ouverte']);
            }

            $data->setEtat($etat);

            $entityManager->persist($data);
            $entityManager->flush();

            return $this->redirectToRoute('app_accueil');
        }
        return $this->render('sortie/sortie.html.twig', [

            'sortieData' => $form->createView()
        ]);
    }
}
