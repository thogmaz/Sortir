<?php

namespace App\DataFixtures;

use App\Entity\Sortie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

class SortieFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $balade = new Sortie();
        $balade->setNom("balade");
        $balade->setDateHeureDebut(new \DateTimeImmutable('2023-02-21 12:00:00'));
        $balade->setDuree(150);
        $balade->setDateLimiteInscription(new \DateTimeImmutable('2023-02-20 12:00:00'));
        $balade->setOrganisateur($this->getReference("virginie"));
        $balade->setNbInscriptionsMax(20);
        $balade->setInfosSortie("balade au parc");
        $balade->setCampus($this->getReference("campus-rennes"));
        $balade->setEtat($this->getReference("passée"));
        $balade->setLieu($this->getReference("parc-rennes"));
        $balade->addParticipant($this->getReference("michel"));
        $manager->persist($balade);

        $fete = new Sortie();
        $fete->setNom("fete");
        $fete->setDateHeureDebut((new \DateTimeImmutable())->add(new \DateInterval('P20D')));
        $fete->setDuree(210);
        $fete->setDateLimiteInscription((new \DateTimeImmutable())->add(new \DateInterval('P19D')));
        $fete->setOrganisateur($this->getReference("kenza"));
        $fete->setNbInscriptionsMax(30);
        $fete->setInfosSortie("fete");
        $fete->setCampus($this->getReference("campus-nantes"));
        $fete->setEtat($this->getReference("ouverte"));
        $fete->setLieu($this->getReference("bar-nantes"));
        $manager->persist($fete);

        $match = new Sortie();
        $match->setNom("match");
        $match->setDateHeureDebut((new \DateTimeImmutable())->add(new \DateInterval('P8D')));
        $match->setDuree(210);
        $match->setDateLimiteInscription((new \DateTimeImmutable())->add(new \DateInterval('P7D')));
        $match->setOrganisateur($this->getReference("thomas"));
        $match->setNbInscriptionsMax(35);
        $match->setInfosSortie("match de foot");
        $match->setCampus($this->getReference("campus-quimper"));
        $match->setEtat($this->getReference("crée"));
        $match->setLieu($this->getReference("terrain-quimper"));
        $match->addParticipant($this->getReference("michel"));
        $match->addParticipant($this->getReference("virginie"));
        $manager->persist($match);

        $laserGame = new Sortie();
        $laserGame->setNom("laser-game");
        $laserGame->setDateHeureDebut((new \DateTimeImmutable())->add(new \DateInterval('P120D')));
        $laserGame->setDuree(90);
        $laserGame->setDateLimiteInscription((new \DateTimeImmutable())->add(new \DateInterval('P119D')));
        $laserGame->setOrganisateur($this->getReference("thomas"));
        $laserGame->setNbInscriptionsMax(10);
        $laserGame->setInfosSortie("Partie de laser game");
        $laserGame->setCampus($this->getReference("campus-quimper"));
        $laserGame->setEtat($this->getReference("ouverte"));
        $laserGame->setLieu($this->getReference("laserGame-quimper"));
        $laserGame->addParticipant($this->getReference("michel"));
        $laserGame->addParticipant($this->getReference("thomas"));
        $manager->persist($laserGame);

        $escalade = new Sortie();
        $escalade->setNom("escalade");
        $escalade->setDateHeureDebut(new \DateTimeImmutable('2022-12-09 14:00:00'));
        $escalade->setDuree(135);
        $escalade->setDateLimiteInscription(new \DateTimeImmutable('2023-06-11 14:00:00'));
        $escalade->setOrganisateur($this->getReference("virginie"));
        $escalade->setNbInscriptionsMax(6);
        $escalade->setInfosSortie("Après-midi escalade");
        $escalade->setCampus($this->getReference("campus-rennes"));
        $escalade->setEtat($this->getReference("passée"));
        $escalade->setLieu($this->getReference("escalade-rennes"));
        $escalade->addParticipant($this->getReference("Amandine"));
        $escalade->addParticipant($this->getReference("Adrien"));
        $manager->persist($escalade);

        $piscine = new Sortie();
        $piscine->setNom("piscine");
        $piscine->setDateHeureDebut(new \DateTimeImmutable('2023-02-25 20:00:00'));
        $piscine->setDuree(180);
        $piscine->setDateLimiteInscription(new \DateTimeImmutable('2023-02-24 20:00:00'));
        $piscine->setOrganisateur($this->getReference("Anna"));
        $piscine->setNbInscriptionsMax(8);
        $piscine->setInfosSortie("Sortie à la piscine municipale");
        $piscine->setCampus($this->getReference("campus-niort"));
        $piscine->setEtat($this->getReference("annulée"));
        $piscine->setLieu($this->getReference("piscine-niort"));
        $manager->persist($piscine);

        $rando = new Sortie();
        $rando->setNom("randonnée");
        $rando->setDateHeureDebut((new \DateTimeImmutable())->add(new \DateInterval('P30D')));
        $rando->setDuree(240);
        $rando->setDateLimiteInscription((new \DateTimeImmutable())->add(new \DateInterval('P29D')));
        $rando->setOrganisateur($this->getReference("virginie"));
        $rando->setNbInscriptionsMax(2);
        $rando->setInfosSortie("Bien s'équiper !");
        $rando->setCampus($this->getReference("campus-rennes"));
        $rando->setEtat($this->getReference("ouverte"));
        $rando->setLieu($this->getReference("parc-rennes"));
        $rando->addParticipant($this->getReference("michel"));
        $manager->persist($rando);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return array(
            LieuFixtures::class,
            EtatFixtures::class,
            CampusFixtures::class,
            ParticipantFixtures::class
        );
    }
}