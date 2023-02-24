<?php

namespace App\Service;

use App\Entity\Sortie;
use App\Entity\Campus;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Boolean;

class SearchData
{
    public ?string $nom = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    public ?\DateTimeInterface $dateHeureDebut = null;
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    public ?\DateTimeInterface $dateLimiteInscription = null;
    #[ORM\ManyToOne(inversedBy: 'sorties')]
    #[ORM\JoinColumn(nullable: false)]
    public ?Campus $campus = null;
    public Boolean $option1 = false;
    public Boolean $option2 = false;
    public Boolean $option3 = false;
    public Boolean $option4 = false;

}