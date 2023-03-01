<?php

namespace App\Service;

use App\Entity\Campus;
use App\Entity\Lieu;

class SortieData
{
    public ?string $nom = null;

    public ?\DateTimeInterface $dateHeureDebut;

    public ?\DateTimeInterface $dateLimiteInscription;

    public ?int $nbInscriptionsMax;

    public ?int $duree;

    public ?string $infosSortie;

    public ?Campus $campus = null;

    public ?Lieu $lieu = null;


}