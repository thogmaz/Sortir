<?php

namespace App\Service;

use App\Entity\Campus;

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