<?php

namespace App\DataFixtures;

use App\Entity\Campus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CampusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $nantes = new Campus();
        $nantes->setNom("Nantes");
        $manager->persist($nantes);
        $this->setReference("Campus de Nantes", $nantes);

        $rennes = new Campus();
        $rennes->setNom("Rennes");
        $manager->persist($rennes);
        $this->setReference("Campus de Rennes", $rennes);

        $quimper = new Campus();
        $quimper->setNom("Quimper");
        $manager->persist($quimper);
        $this->setReference("Campus de Quimper", $quimper);

        $manager->flush();
    }

}
