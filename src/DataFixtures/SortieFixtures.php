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
        $balade->setDuree(new \DateTimeImmutable('02:30:00'));
        $balade->setDateLimiteInscription(new \DateTimeImmutable('2023-02-20 12:00:00'));
        $balade->setOrganisateur($this->getReference("virginie"));
        $balade->setNbInscriptionsMax(20);
        $balade->setInfosSortie("balade au parc");
        $balade->setCampus($this->getReference("campus-rennes"));
        $balade->setEtat($this->getReference("crée"));
        $balade->setLieu($this->getReference("parc-rennes"));
        $balade->addParticipant($this->getReference("michel"));
        $manager->persist($balade);

        $fete = new Sortie();
        $fete->setNom("fete");
        $fete->setDateHeureDebut(new \DateTimeImmutable('2023-02-28 20:00:00'));
        $fete->setDuree(new \DateTimeImmutable('03:30:00'));
        $fete->setDateLimiteInscription(new \DateTimeImmutable('2023-02-27 20:00:00'));
        $fete->setOrganisateur($this->getReference("kenza"));
        $fete->setNbInscriptionsMax(30);
        $fete->setInfosSortie("fete");
        $fete->setCampus($this->getReference("campus-nantes"));
        $fete->setEtat($this->getReference("ouverte"));
        $fete->setLieu($this->getReference("bar-nantes"));
        $manager->persist($fete);

        $match = new Sortie();
        $match->setNom("match");
        $match->setDateHeureDebut(new \DateTimeImmutable('2023-03-12 16:00:00'));
        $match->setDuree(new \DateTimeImmutable('03:30:00'));
        $match->setDateLimiteInscription(new \DateTimeImmutable('2023-03-11 16:00:00'));
        $match->setOrganisateur($this->getReference("thomas"));
        $match->setNbInscriptionsMax(35);
        $match->setInfosSortie("match de foot");
        $match->setCampus($this->getReference("campus-quimper"));
        $match->setEtat($this->getReference("crée"));
        $match->setLieu($this->getReference("terrain-quimper"));
        $match->addParticipant($this->getReference("michel"));
        $manager->persist($match);

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