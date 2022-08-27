<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity
 */
class Team
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_team", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTeam;

    /**
     * @var int
     *
     * @ORM\Column(name="max", type="integer", nullable=false)
     */
    private $max;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=500, nullable=false)
     */
    private $nom;

    /**
     * @param int $idTeam
     * @param int $max
     * @param string $nom
     */
    public function __construct(int $idTeam, int $max, string $nom)
    {
        $this->idTeam = $idTeam;
        $this->max = $max;
        $this->nom = $nom;
    }

    /**
     * @return int
     */
    public function getIdTeam(): int
    {
        return $this->idTeam;
    }

    /**
     * @param int $idTeam
     */
    public function setIdTeam(int $idTeam): void
    {
        $this->idTeam = $idTeam;
    }

    /**
     * @return int
     */
    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * @param int $max
     */
    public function setMax(int $max): void
    {
        $this->max = $max;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

}
