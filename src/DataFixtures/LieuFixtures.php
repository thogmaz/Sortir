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

    public function load(ObjectManager $manager): void
    {
        $parcRennes = new Lieu();
        $parcRennes->setNom("parc-rennes");
        $parcRennes->setRue("rue du parc");
        $parcRennes->setLatitude(48.117266);
        $parcRennes->setLongitude(-1.6777926);
        $parcRennes->setVille($this->getReference("ville-rennes"));
        $manager->persist($parcRennes);
        $this->addReference("parc-rennes", $parcRennes);

        $barNantes = new Lieu();
        $barNantes->setNom("bar machin");
        $barNantes->setRue("rue du bar");
        $barNantes->setLatitude(58.117266);
        $barNantes->setLongitude(-3.6777926);
        $barNantes->setVille($this->getReference("ville-nantes"));
        $manager->persist($barNantes);
        $this->addReference("bar-nantes", $barNantes);

        $terrainQuimper = new Lieu();
        $terrainQuimper->setNom("terrain-quimper");
        $terrainQuimper->setRue("rue du terrain");
        $terrainQuimper->setLatitude(28.117266);
        $terrainQuimper->setLongitude(-5.6777926);
        $terrainQuimper->setVille($this->getReference("ville-quimper"));
        $manager->persist($terrainQuimper);
        $this->addReference("terrain-quimper", $terrainQuimper);

        $laserGameQuimper = new Lieu();
        $laserGameQuimper->setNom("laserGame-quimper");
        $laserGameQuimper->setRue("rue du laser game");
        $laserGameQuimper->setLatitude(17.117266);
        $laserGameQuimper->setLongitude(-9.6777926);
        $laserGameQuimper->setVille($this->getReference("ville-quimper"));
        $manager->persist($laserGameQuimper);
        $this->addReference("laserGame-quimper", $laserGameQuimper);

        $manager->flush();
    }
}