<?php

namespace App\DataFixtures;

use App\Entity\Sortie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\DateTime;

class SortieFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return array(
            LieuFixtures::class,
            EtatFixtures::class,
            CampusFixtures::class,
            ParticipantFixtures::class
        );
    }
    public function load(ObjectManager $manager)
    {
            $balade = new Sortie();
            $balade->setNom("Balade");
            $balade->setDateHeureDebut(new \DateTimeImmutable('2023-02-21'));
            $balade->setDuree(new \DateTimeImmutable('2023-02-21'));
            $balade->setDateLimiteInscription(new \DateTimeImmutable('2023-02-20'));
            $balade->setNbInscriptionsMax(20);
            $balade->setInfosSortie("Balade en forêt");
            $balade->setCampus($this->getReference("Campus de Nantes"));
            $balade->setEtat($this->getReference("Crée"));
            $balade->setLieu($this->getReference("Nantes"));
            $manager->persist($balade);

        $fete = new Sortie();
        $fete->setNom("Fête");
        $fete->setDateHeureDebut(new \DateTimeImmutable('2023-02-28'));
        $fete->setDuree(new \DateTimeImmutable('2023-02-21'));
        $fete->setDateLimiteInscription(new \DateTimeImmutable('2023-02-27'));
        $fete->setNbInscriptionsMax(30);
        $fete->setInfosSortie("Fête");
        $fete->setCampus($this->getReference("Campus de Rennes"));
        $balade->setEtat($this->getReference("Ouverte"));
        $balade->setCampus($this->getReference("Rennes"));
        $manager->persist($fete);

            $manager->flush();
        }
}