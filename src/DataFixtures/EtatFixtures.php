<?php

namespace App\DataFixtures;

use App\Entity\Etat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EtatFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cree = new Etat();
        $cree->setLibelle("crée");
        $manager->persist($cree);
        $this->addReference("crée", $cree);

        $ouverte = new Etat();
        $ouverte->setLibelle("ouverte");
        $manager->persist($ouverte);
        $this->addReference("ouverte", $ouverte);

        $cloturee = new Etat();
        $cloturee->setLibelle("cloturée");
        $manager->persist($cloturee);
        $this->addReference("cloturée", $cloturee);

        $enCours = new Etat();
        $enCours->setLibelle("en cours");
        $manager->persist($enCours);
        $this->addReference("en cours", $enCours);

        $passee = new Etat();
        $passee->setLibelle("passée");
        $manager->persist($passee);
        $this->addReference("passée", $passee);

        $annulée = new Etat();
        $annulée->setLibelle("annulée");
        $manager->persist($cloturee);
        $this->addReference("annulée", $annulée);

        $manager->flush();
    }

}
