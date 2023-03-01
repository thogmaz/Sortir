<?php

namespace App\Service;

use App\Entity\Campus;
use phpDocumentor\Reflection\PseudoTypes\IntegerRange;

class SortieData
{
    public ?string $nom = null;

    public ?\DateTimeInterface $dateHeureDebut;

    public ?\DateTimeInterface $dateLimiteInscription;

    public ?int $nbInscriptionsMax;

    public ?int $duree;

    public ?string $infosSortie;

    public ?Campus $campus = null;
}