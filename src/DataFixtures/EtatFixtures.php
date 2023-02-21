<?php

namespace App\DataFixtures;

use App\Entity\Etat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $cree = new Etat();
            $cree->setLibelle("Crée");
            $this->setReference("Crée", $cree);
            $manager->persist($cree);

            $ouverte = new Etat();
            $ouverte->setLibelle("Ouverte");
            $this->setReference("Ouverte", $ouverte);
            $manager->persist($ouverte);

            $cloturee = new Etat();
            $cloturee->setLibelle("Cloturée");
            $this->setReference("Cloturée", $cloturee);
            $manager->persist($cloturee);

            $manager->flush();
        }

}
