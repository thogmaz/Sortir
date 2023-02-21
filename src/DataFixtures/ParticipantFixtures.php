<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ParticipantFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies(): array
    {
        return array(
            CampusFixtures::class
        );
    }
    public function load(ObjectManager $manager): void
    {
            $virginie = new Participant();
            $virginie->setNom("Merlino");
            $virginie->setPrenom("Virginie");
            $virginie->setTelephone("0611111111");
            $virginie->setEmail("virginie@gmail.com");
            $virginie->setPassword("12345");
            $virginie->setActif(true);
            $virginie->setPseudo("virg01");
            $virginie->setPhotoProfil("Nom");
            $virginie->setCampus($this->getReference("campus-rennes"));
            $manager->persist($virginie);
            $this->addReference("virginie", $virginie);

        $thomas = new Participant();
        $thomas->setNom("Fanouillere");
        $thomas->setPrenom("Thomas");
        $thomas->setTelephone("0622222222");
        $thomas->setEmail("thomas@gmail.com");
        $thomas->setPassword("67890");
        $thomas->setActif(true);
        $thomas->setPseudo("thogmaz");
        $thomas->setPhotoProfil("Nom");
        $thomas->setCampus($this->getReference("campus-quimper"));
        $manager->persist($thomas);
        $this->addReference("thomas", $thomas);

        $kenza = new Participant();
        $kenza->setNom("Behladi");
        $kenza->setPrenom("Kenza");
        $kenza->setTelephone("0633333333");
        $kenza->setEmail("kenza@gmail.com");
        $kenza->setPassword("24680");
        $kenza->setActif(true);
        $kenza->setPseudo("knoozx");
        $kenza->setPhotoProfil("Nom");
        $kenza->setCampus($this->getReference("campus-nantes"));
        $manager->persist($kenza);
        $this->addReference("kenza", $kenza);

        $manager->flush();
        }

}