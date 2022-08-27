<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
#[ApiResource(formats: ['json'])]
#[ApiFilter(SearchFilter::class, properties: ['id' => 'exact', 'feature' => 'ipartial', 'assignedBy' => 'ipartial'])]

/**
 * Ticketfree
 *
 * @ORM\Table(name="ticketfree", indexes={@ORM\Index(name="pkf", columns={"id_dev"})})
 * @ORM\Entity
 */
class Ticketfree
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
     * @ORM\Column(name="feature", type="string", length=500, nullable=false)
     */
    private $feature;
    /**
     * @var string
     *
     * @ORM\Column(name="assigned_by", type="string", length=500, nullable=false)
     */
    private $assignedBy;

    /**
     * @var \App\Entity\Developer
     *
     * @ORM\ManyToOne(targetEntity="Developer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dev", referencedColumnName="id_dev" )
     * })
     */
    private $idDev;

    /**
     * @param int $idTicket
     * @param int $size
     * @param string $state
     * @param string $feature
     * @param string $assignedBy
     * @param \App\Entity\Developer $idDev
     */
    public function __construct(int $idTicket, int $size, string $state, string $feature, string $assignedBy, \App\Entity\Developer $idDev)
    {
        $this->idTicket = $idTicket;
        $this->size = $size;
        $this->state = $state;
        $this->feature = $feature;
        $this->assignedBy = $assignedBy;
        $this->idDev = $idDev;
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
    public function getSize(): int
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
     * @return string
     */
    public function getAssignedBy(): string
    {
        return $this->assignedBy;
    }

    /**
     * @param string $assignedBy
     */
    public function setAssignedBy(string $assignedBy): void
    {
        $this->assignedBy = $assignedBy;
    }

    /**
     * @return \App\Entity\Developer
     */
    public function getIdDev(): \App\Entity\Developer
    {
        return $this->idDev;
    }

    /**
     * @param \App\Entity\Developer $idDev
     */
    public function setIdDev(\App\Entity\Developer $idDev): void
    {
        $this->idDev = $idDev;
    }


}
