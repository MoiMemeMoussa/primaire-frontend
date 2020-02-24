<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClasseAnnee
 *
 * @ORM\Table(name="classe_annee", indexes={@ORM\Index(name="FK5gj0f14616b7r351au6pb11kd", columns={"idClasse"})})
 * @ORM\Entity
 */
class ClasseAnnee
{
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


}
