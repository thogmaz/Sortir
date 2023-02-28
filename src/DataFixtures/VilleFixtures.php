<?php

namespace App\DataFixtures;

use App\Entity\Ville;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VilleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nantes = new Ville();
        $nantes->setNom("Nantes");
        $nantes->setCodePostal(44000);
        $manager->persist($nantes);
        $this->addReference('ville-nantes', $nantes);

        $rennes = new Ville();
        $rennes->setNom("Rennes");
        $rennes->setCodePostal(35000);
        $manager->persist($rennes);
        $this->addReference('ville-rennes', $rennes);

        $quimper = new Ville();
        $quimper->setNom("Quimper");
        $quimper->setCodePostal(29000);
        $manager->persist($quimper);
        $this->addReference('ville-quimper', $quimper);

        $niort = new Ville();
        $niort->setNom("Niort");
        $niort->setCodePostal(79000);
        $manager->persist($niort);
        $this->addReference('ville-niort', $niort);

        $manager->flush();
    }
}
