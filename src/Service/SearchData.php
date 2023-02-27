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

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    public ?\DateTimeInterface $dateHeureDebut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    public ?\DateTimeInterface $dateLimiteInscription = null;

    #[ORM\ManyToOne(inversedBy: 'sorties')]

    #[ORM\JoinColumn(nullable: false)]
    public ?Campus $campus = null;


    public Bool $option1 = false;
    public Bool $option2 = false;
    public Bool $option3 = false;
    public Bool $option4 = false;


    /**
     * @return Campus|null
     */
    public function getCampus(): ?Campus
    {
        return $this->campus;
    }

}