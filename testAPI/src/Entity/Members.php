<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Members
 *
 * @ORM\Table(name="members", indexes={@ORM\Index(name="fk_2", columns={"id_dev"}), @ORM\Index(name="fk_3", columns={"id_team"})})
 * @ORM\Entity
 */
class Members
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Developer
     *
     * @ORM\ManyToOne(targetEntity="Developer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_dev", referencedColumnName="id_dev")
     * })
     */
    private $idDev;

    /**
     * @var \Team
     *
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_team", referencedColumnName="id_team")
     * })
     */
    private $idTeam;


}
