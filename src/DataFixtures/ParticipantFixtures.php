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
    public function load(ObjectManager $manager)
    {
            $virginie = new Participant();
            $virginie->setNom("Merlino");
            $virginie->setPrenom("Virginie");
            $virginie->setTelephone("numéro");
            $virginie->setEmail("virginie@gmail.com");
            $virginie->setPassword("12345");
            $virginie->setActif(1);
            $virginie->setPseudo("virg01");
            $virginie->setPhotoProfil("Nom");
            $virginie->setCampus($this->getReference("Campus de Rennes"));
            $manager->persist($virginie);
            $this->setReference("Participant", $virginie);

        $thomas = new Participant();
        $thomas->setNom("Fanouillere");
        $thomas->setPrenom("Thomas");
        $thomas->setTelephone("numéro");
        $thomas->setEmail("thomas@gmail.com");
        $thomas->setPassword("67890");
        $thomas->setActif(1);
        $thomas->setPseudo("thogmaz");
        $thomas->setPhotoProfil("Nom");
        $thomas->setCampus($this->getReference("Campus de Quimper"));
        $manager->persist($thomas);
        $this->setReference("Participant", $thomas);

        $kenza = new Participant();
        $kenza->setNom("Behladi");
        $kenza->setPrenom("Kenza");
        $kenza->setTelephone("numéro");
        $kenza->setEmail("kenza@gmail.com");
        $kenza->setPassword("24680");
        $kenza->setActif(1);
        $kenza->setPseudo("knoozx");
        $kenza->setPhotoProfil("Nom");
        $kenza->setCampus($this->getReference("Campus de Nantes"));
        $manager->persist($kenza);
        $this->setReference("Participant", $kenza);

        $manager->flush();
        }

}
