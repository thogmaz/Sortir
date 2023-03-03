<?php

namespace App\Controller;

use App\Form\SearchForm;
use App\Repository\EtatRepository;
use App\Repository\ParticipantRepository;
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
        $data->campus = $this->getUser()->getCampus();
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $sorties = $sortieRepository->findByFilter($data, $this->getUser());


        return $this->render('accueil/accueil.html.twig', [
            'sorties' => $sorties,
            'search' => $form->createView()
        ]);
    }

    #[Route('/subscription/{id}', name: 'app_subscription')]
    public function newSubscription(SortieRepository $sortieRepository, ParticipantRepository $participantRepository, EntityManagerInterface $entityManager, int $id): Response
    {
        //récupère la sortie
        $sortie = $sortieRepository->find($id);

        //compare le nb d'inscrits avec le nb max de participants possible
        if (($sortie->getParticipants()->count()) == ($sortie->getNbInscriptionsMax())) {
            $this->addFlash(
                'error', "Le nombre de participants maximum est atteint, vous ne pouvez pas vous inscrire");
        } else {
            //récupère le participant
            $participant = $this->getUser();
            $sortie->addParticipant($participant);
            $entityManager->flush();
            $this->addFlash('success', "Vous êtes inscrit !");
        }
        return $return = $this->redirectToRoute('app_accueil');;
    }

    #[Route('/unsubscribe/{id}', name: 'app_unsubscribe')]
    public function removeSubscription(SortieRepository $sortieRepository, ParticipantRepository $participantRepository, EntityManagerInterface $entityManager, int $id): Response
    {
        //récupère la sortie et la date du jour
        $sortie = $sortieRepository->find($id);
        $date = new \DateTime('now');

        //vérifie que la sortie n'a pas débuté
        if ($date >= ($sortie->getDateHeureDebut())) {
            $this->addFlash('error', "Vous ne pouvez pas vous désinscrire : la sortie a débuté");
        } else {

            //récupère le participant
            $participant = $this->getUser();
            $sortie->removeParticipant($participant);
            $entityManager->flush();
            $this->addFlash('success', "Vous êtes désinscrit !");
        }
        return $this->redirectToRoute('app_accueil');
    }

    #[Route('/publish/{id}', name: 'app_publish')]
    public function publish(Request $request, EtatRepository $etatRepository, SortieRepository $sortieRepository, ParticipantRepository $participantRepository, EntityManagerInterface $entityManager, int $id): Response
    {
        //récupère la sortie
        $sortie = $sortieRepository->find($id);

        $sortie->setEtat($etatRepository->findOneBy(['libelle' => 'ouverte']));

        $entityManager->flush();
        $this->addFlash('success', "La sortie est publiée");

        return $this->redirectToRoute('app_accueil');
    }
}





