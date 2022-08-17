<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
#[ApiResource]
/**
 * Ticket
 *
 * @ORM\Table(name="ticket", indexes={@ORM\Index(name="fk_5", columns={"id_dev"}), @ORM\Index(name="fk_6", columns={"id_projet"})})
 * @ORM\Entity
 */
class Ticket
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_ticket", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTicket;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer", nullable=true)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=50, nullable=false)
     */
    private $state;
    /**
     * @var string
     *
     * @ORM\Column(name="feature", type="string", length=100, nullable=false)
     */
    private $feature;

    /**
     * @var \App\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user" )
     * })
     */
    private $idUser;

    /**
     * @var \App\Entity\Project
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_projet", referencedColumnName="id_p")
     * })
     */
    private $idProjet;

    /**
     * @param int $idTicket
     * @param int $size
     * @param string $state
     * @param string $feature
     * @param \App\Entity\User $idUser
     * @param \App\Entity\Project $idProjet
     */
    public function __construct(int $idTicket, int $size, string $state, string $feature, \App\Entity\User $idUser, \App\Entity\Project $idProjet)
    {
        $this->idTicket = $idTicket;
        $this->size = $size;
        $this->state = $state;
        $this->feature = $feature;
        $this->idUser = $idUser;
        $this->idProjet = $idProjet;
    }

    /**
     * @return int
     */
    public function getIdTicket(): int
    {
        return $this->idTicket;
    }

    /**
     * @param int $idTicket
     */
    public function setIdTicket(int $idTicket): void
    {
        $this->idTicket = $idTicket;
    }

    /**
     * @return int
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState(string $state): void
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getFeature(): string
    {
        return $this->feature;
    }

    /**
     * @param string $feature
     */
    public function setFeature(string $feature): void
    {
        $this->feature = $feature;
    }

    /**
     * @return \App\Entity\User
     */
    public function getIdUser(): \App\Entity\User
    {
        return $this->idUser;
    }

    /**
     * @param \App\Entity\User $idUser
     */
    public function setIdUser(\App\Entity\User $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return \App\Entity\Project
     */
    public function getIdProjet(): \App\Entity\Project
    {
        return $this->idProjet;
    }

    /**
     * @param \App\Entity\Project $idProjet
     */
    public function setIdProjet(\App\Entity\Project $idProjet): void
    {
        $this->idProjet = $idProjet;
    }


}
