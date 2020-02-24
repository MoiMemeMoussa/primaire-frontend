<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnneeTrimestre
 *
 * @ORM\Table(name="annee_trimestre", indexes={@ORM\Index(name="FK7b8f509f4q0exf1l6vmub26le", columns={"idTrimestre"}), @ORM\Index(name="FKc4pxhylxw0acra81nhjrwqjjf", columns={"id"})})
 * @ORM\Entity
 */
class AnneeTrimestre
{
    /**
     * @var int
     *
     * @ORM\Column(name="idAnnee", type="integer", nullable=false)
     */
    private $idannee;

    /**
     * @var int
     *
     * @ORM\Column(name="idTrimestre", type="integer", nullable=false)
     */
    private $idtrimestre;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="endDate", type="date", nullable=true)
     */
    private $enddate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="startDate", type="date", nullable=true)
     */
    private $startdate;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;


}
