<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
#[ApiResource(formats: ['json'])]
/**
 * Project
 *
 * @ORM\Table(name="project", indexes={@ORM\Index(name="fk_4", columns={"id_team"})})
 * @ORM\Entity
 */
class Project
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_p", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idP;

    /**
     * @var string
     *
     * @ORM\Column(name="technology", type="string", length=500, nullable=false)
     */
    private $technology;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=500, nullable=false)
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=500, nullable=false)
     */
    private $nom;
    /**
     * @var \App\Entity\Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_team", referencedColumnName="id_team")
     * })
     */
    private $idTeam;

    /**
     * @param int $idP
     * @param string $technology
     * @param string $description
     * @param string $nom
     * @param Team $idTeam
     */
    public function __construct(int $idP, string $technology, string $description, string $nom, Team $idTeam)
    {
        $this->idP = $idP;
        $this->technology = $technology;
        $this->description = $description;
        $this->nom = $nom;
        $this->idTeam = $idTeam;
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

    /**
     * @param int $idP
     * @param string $technology
     * @param string $description
     * @param \App\Entity\Team $idTeam
     */

    /**
     * @return int
     */
    public function getIdP(): int
    {
        return $this->idP;
    }

    /**
     * @param int $idP
     */
    public function setIdP(int $idP): void
    {
        $this->idP = $idP;
    }

    /**
     * @return string
     */
    public function getTechnology(): string
    {
        return $this->technology;
    }

    /**
     * @param string $technology
     */
    public function setTechnology(string $technology): void
    {
        $this->technology = $technology;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return \App\Entity\Team
     */
    public function getIdTeam(): \App\Entity\Team
    {
        return $this->idTeam;
    }

    /**
     * @param \App\Entity\Team $idTeam
     */
    public function setIdTeam(\App\Entity\Team $idTeam): void
    {
        $this->idTeam = $idTeam;
    }
    public function __toString(): string
    {
        return $this->getIdP();
    }


}
