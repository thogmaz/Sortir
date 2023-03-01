<?php

namespace App\DataFixtures;

use App\Entity\Participant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ParticipantFixtures extends Fixture implements DependentFixtureInterface
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

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
        $password = $this->hasher->hashPassword($virginie, '12345');
        $virginie->setPassword($password);
        $virginie->setActif(true);
        $virginie->setPseudo("Virg01");
        $virginie->setPhotoProfil("");
        $virginie->setCampus($this->getReference("campus-rennes"));
        $virginie->setRoles(['ROLE_USER']);
        $manager->persist($virginie);
        $this->addReference("virginie", $virginie);

        $thomas = new Participant();
        $thomas->setNom("Fanouillere");
        $thomas->setPrenom("Thomas");
        $thomas->setTelephone("0622222222");
        $thomas->setEmail("thomas@gmail.com");
        $password = $this->hasher->hashPassword($thomas, '67890');
        $thomas->setPassword($password);
        $thomas->setActif(true);
        $thomas->setPseudo("Thogmaz");
        $thomas->setPhotoProfil("");
        $thomas->setCampus($this->getReference("campus-quimper"));
        $thomas->setRoles(['ROLE_USER']);
        $manager->persist($thomas);
        $this->addReference("thomas", $thomas);

        $kenza = new Participant();
        $kenza->setNom("Behladi");
        $kenza->setPrenom("Kenza");
        $kenza->setTelephone("0633333333");
        $kenza->setEmail("kenza@gmail.com");
        $password = $this->hasher->hashPassword($kenza, '24680');
        $kenza->setPassword($password);
        $kenza->setActif(true);
        $kenza->setPseudo("Knoozx");
        $kenza->setPhotoProfil("");
        $kenza->setCampus($this->getReference("campus-nantes"));
        $kenza->setRoles(['ROLE_USER']);
        $manager->persist($kenza);
        $this->addReference("kenza", $kenza);

        $michel = new Participant();
        $michel->setNom("Jean");
        $michel->setPrenom("Michel");
        $michel->setTelephone("0644444444");
        $michel->setEmail("michel@gmail.com");
        $password = $this->hasher->hashPassword($michel, '13579');
        $michel->setPassword($password);
        $michel->setActif(true);
        $michel->setPseudo("Mich");
        $michel->setPhotoProfil("");
        $michel->setCampus($this->getReference("campus-nantes"));
        $michel->setRoles(['ROLE_USER']);
        $manager->persist($michel);
        $this->addReference("michel", $michel);

        $admin = new Participant();
        $admin->setNom("Admin");
        $admin->setPrenom("Admin");
        $admin->setTelephone("0655555555");
        $admin->setEmail("admin@gmail.com");
        $password = $this->hasher->hashPassword($admin, '00000');
        $admin->setPassword($password);
        $admin->setActif(true);
        $admin->setPseudo("Administrator");
        $admin->setPhotoProfil("");
        $admin->setCampus($this->getReference("campus-quimper"));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $this->addReference("admin", $admin);

        $aurelie = new Participant();
        $aurelie->setNom("Dupont");
        $aurelie->setPrenom("Aurélie");
        $aurelie->setTelephone("0612345678");
        $aurelie->setEmail("aurelie@gmail.com");
        $password = $this->hasher->hashPassword($aurelie, '01010');
        $aurelie->setPassword($password);
        $aurelie->setActif(true);
        $aurelie->setPseudo("Aurelie03");
        $aurelie->setPhotoProfil("");
        $aurelie->setCampus($this->getReference("campus-niort"));
        $aurelie->setRoles(['ROLE_USER']);
        $manager->persist($aurelie);
        $this->addReference("aurélie", $aurelie);

        $christophe = new Participant();
        $christophe->setNom("Durand");
        $christophe->setPrenom("Christophe");
        $christophe->setTelephone("0687654321");
        $christophe->setEmail("christophe@gmail.com");
        $password = $this->hasher->hashPassword($christophe, '20202');
        $christophe->setPassword($password);
        $christophe->setActif(true);
        $christophe->setPseudo("Cricri");
        $christophe->setPhotoProfil("");
        $christophe->setCampus($this->getReference("campus-niort"));
        $christophe->setRoles(['ROLE_USER']);
        $manager->persist($christophe);
        $this->addReference("christophe", $christophe);

        $adrien = new Participant();
        $adrien->setNom("Petit");
        $adrien->setPrenom("Adrien");
        $adrien->setTelephone("0600000000");
        $adrien->setEmail("adrien@gmail.com");
        $password = $this->hasher->hashPassword($adrien, '30303');
        $adrien->setPassword($password);
        $adrien->setActif(false);
        $adrien->setPseudo("Adri35");
        $adrien->setPhotoProfil("");
        $adrien->setCampus($this->getReference("campus-rennes"));
        $adrien->setRoles(['ROLE_USER']);
        $manager->persist($adrien);
        $this->addReference("Adrien", $adrien);

        $amandine = new Participant();
        $amandine->setNom("Legrand");
        $amandine->setPrenom("Amandine");
        $amandine->setTelephone("0666666666");
        $amandine->setEmail("amandine@gmail.com");
        $password = $this->hasher->hashPassword($amandine, '40404');
        $amandine->setPassword($password);
        $amandine->setActif(true);
        $amandine->setPseudo("Amandinedu38");
        $amandine->setPhotoProfil("");
        $amandine->setCampus($this->getReference("campus-rennes"));
        $amandine->setRoles(['ROLE_USER']);
        $manager->persist($amandine);
        $this->addReference("Amandine", $amandine);

        $edouard = new Participant();
        $edouard->setNom("Moreau");
        $edouard->setPrenom("Edouard");
        $edouard->setTelephone("0677777777");
        $edouard->setEmail("edouard@gmail.com");
        $password = $this->hasher->hashPassword($edouard, '50505');
        $edouard->setPassword($password);
        $edouard->setActif(true);
        $edouard->setPseudo("Doudou");
        $edouard->setPhotoProfil("");
        $edouard->setCampus($this->getReference("campus-nantes"));
        $edouard->setRoles(['ROLE_USER']);
        $manager->persist($edouard);
        $this->addReference("Edouard", $edouard);

        $paul = new Participant();
        $paul->setNom("Morel");
        $paul->setPrenom("Paul");
        $paul->setTelephone("0688888888");
        $paul->setEmail("paul@gmail.com");
        $password = $this->hasher->hashPassword($paul, '60606');
        $paul->setPassword($password);
        $paul->setActif(true);
        $paul->setPseudo("Polo");
        $paul->setPhotoProfil("");
        $paul->setCampus($this->getReference("campus-quimper"));
        $paul->setRoles(['ROLE_USER']);
        $manager->persist($paul);
        $this->addReference("Paul", $paul);

        $anna = new Participant();
        $anna->setNom("Dubois");
        $anna->setPrenom("Anna");
        $anna->setTelephone("0699999999");
        $anna->setEmail("anna@gmail.com");
        $password = $this->hasher->hashPassword($anna, '70707');
        $anna->setPassword($password);
        $anna->setActif(true);
        $anna->setPseudo("Nana");
        $anna->setPhotoProfil("");
        $anna->setCampus($this->getReference("campus-niort"));
        $anna->setRoles(['ROLE_USER']);
        $manager->persist($anna);
        $this->addReference("Anna", $anna);

        $manager->flush();
    }
}
