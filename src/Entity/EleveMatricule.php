<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EleveMatricule
 *
 * @ORM\Table(name="eleve_matricule", indexes={@ORM\Index(name="FK8bmviioemr7qp9hsa2p72grqp", columns={"idMatricule"})})
 * @ORM\Entity
 */
class EleveMatricule
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEleve", type="integer", nullable=false)
     */
    private $ideleve;

    /**
     * @var int
     *
     * @ORM\Column(name="idClasse", type="integer", nullable=false)
     */
    private $idclasse;

    /**
     * @var int
     *
     * @ORM\Column(name="idAnnee", type="integer", nullable=false)
     */
    private $idannee;

    /**
     * @var int
     *
     * @ORM\Column(name="idMatricule", type="integer", nullable=false)
     */
    private $idmatricule;


}
