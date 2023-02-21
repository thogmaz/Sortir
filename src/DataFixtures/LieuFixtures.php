<?php

namespace App\DataFixtures;

use App\Entity\Lieu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LieuFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return array(
            VilleFixtures::class,
        );
    }

    public function load(ObjectManager $manager)
    {
        $parc = new Lieu();
        $parc->setNom("Parc machin");
        $parc->setRue("Rue du parc");
        $parc->setLatitude(48.117266);
        $parc->setLongitude(-1.6777926);
        $parc->setVille($this->getReference("Rennes"));
        $this->setReference("Lieu", $parc);
        $manager->persist($parc);

        $bar = new Lieu();
        $bar->setNom("Bar machin");
        $bar->setRue("Rue du bar");
        $bar->setLatitude(58.117266);
        $bar->setLongitude(-3.6777926);
        $bar->setVille($this->getReference("Quimper"));
        $this->setReference("Lieu", $bar);
        $manager->persist($bar);

        $manager->flush();
    }
}