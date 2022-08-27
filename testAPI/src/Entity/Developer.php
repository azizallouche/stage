<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Developer
 *
 * @ORM\Table(name="developer", indexes={@ORM\Index(name="fk_1", columns={"id_user"})})
 * @ORM\Entity
 */
class Developer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_dev", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDev;

    /**
     * @var string
     *
     * @ORM\Column(name="skill", type="string", length=200, nullable=false)
     */
    private $skill;

    /**
     * @var \App\Entity\\User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id_user")
     * })
     */
    private $idUser;

    /**
     * @param int $idDev
     * @param string $skill
     * @param \App\Entity\User $idUser
     */
    public function __construct(int $idDev, string $skill, \App\Entity\User $idUser)
    {
        $this->idDev = $idDev;
        $this->skill = $skill;
        $this->idUser = $idUser;
    }

    /**
     * @return int
     */
    public function getIdDev(): int
    {
        return $this->idDev;
    }

    /**
     * @param int $idDev
     */
    public function setIdDev(int $idDev): void
    {
        $this->idDev = $idDev;
    }

    /**
     * @return string
     */
    public function getSkill(): string
    {
        return $this->skill;
    }

    /**
     * @param string $skill
     */
    public function setSkill(string $skill): void
    {
        $this->skill = $skill;
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

    public function __toString():string
    {
        return $this->getIdDev();
    }
}
