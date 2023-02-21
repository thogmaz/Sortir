<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VilleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $nantes = new Ville();
        $nantes->setNom("Nantes");
        $nantes->setCodePostal(44000);
        $manager->persist($nantes);
        $this->setReference("Nantes", $nantes);

        $rennes = new Ville();
        $rennes->setNom("Rennes");
        $rennes->setCodePostal(35000);
        $manager->persist($rennes);
        $this->setReference("Rennes", $rennes);

        $quimper = new Ville();
        $quimper->setNom("Quimper");
        $quimper->setCodePostal(29000);
        $manager->persist($quimper);
        $this->setReference("Quimper", $quimper);

        $manager->flush();
    }
}
