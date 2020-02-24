<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matricule
 *
 * @ORM\Table(name="matricule")
 * @ORM\Entity
 */
class Matricule
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMatricule", type="integer", nullable=false)
     */
    private $idmatricule;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=false)
     */
    private $value;


}
