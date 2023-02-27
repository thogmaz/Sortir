<?php

namespace App\Service;

use App\Entity\Sortie;
use App\Entity\Campus;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;

class SearchData
{
    public ?string $nom = null;


    public ?\DateTimeInterface $dateDebutRecherche;


    public ?\DateTimeInterface $dateFinRecherche;


    public ?Campus $campus = null;


    public bool $option1 = false;
    public bool $option2 = false;
    public bool $option3 = false;
    public bool $option4 = false;


}