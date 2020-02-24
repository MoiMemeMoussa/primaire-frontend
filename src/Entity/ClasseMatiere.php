<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClasseMatiere
 *
 * @ORM\Table(name="classe_matiere", indexes={@ORM\Index(name="FK2g14280y7mdao7gubk7ega9do", columns={"idMatiere"})})
 * @ORM\Entity
 */
class ClasseMatiere
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
     * @ORM\Column(name="idMatiere", type="integer", nullable=false)
     */
    private $idmatiere;

    /**
     * @var int
     *
     * @ORM\Column(name="idAnnee", type="integer", nullable=false)
     */
    private $idannee;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bareme", type="integer", nullable=true)
     */
    private $bareme;


}
