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
            $virginie->setPseudo("virg01");
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
        $thomas->setPseudo("thogmaz");
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
        $kenza->setPseudo("knoozx");
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
        $michel->setPseudo("mich");
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
        $admin->setPseudo("administrator");
        $admin->setPhotoProfil("");
        $admin->setCampus($this->getReference("campus-quimper"));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);
        $this->addReference("admin", $admin);

        $manager->flush();
        }

}
