<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CampusFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $campusNantes = new Campus();
        $campusNantes->setNom("Nantes");
        $manager->persist($campusNantes);
        $this->addReference("campus-nantes", $campusNantes);

        $campusRennes = new Campus();
        $campusRennes->setNom("Rennes");
        $manager->persist($campusRennes);
        $this->addReference("campus-rennes", $campusRennes);

        $campusQuimper = new Campus();
        $campusQuimper->setNom("Quimper");
        $manager->persist($campusQuimper);
        $this->addReference("campus-quimper", $campusQuimper);

        $manager->flush();
    }

}
