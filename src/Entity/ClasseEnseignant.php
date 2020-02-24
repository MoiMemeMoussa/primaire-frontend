<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClasseEnseignant
 *
 * @ORM\Table(name="classe_enseignant", indexes={@ORM\Index(name="FKhetrmao9nqmt5qger1bq56kjb", columns={"matricule"})})
 * @ORM\Entity
 */
class ClasseEnseignant
{
    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=255, nullable=false)
     */
    private $matricule;

    /**
     * @var int
     *
     * @ORM\Column(name="idClasse", type="integer", nullable=false)
     */
    private $idclasse;

    /**
     * @var string
     *
     * @ORM\Column(name="idAnnee", type="string", length=255, nullable=false)
     */
    private $idannee;

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


}
