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
     * @ORM\Id
     * @ORM\Column(name="idClasse", type="integer", nullable=false)
     */
    private $idclasse;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="idAnnee", type="integer", nullable=false)
     */
    private $idannee;

    public function getIdclasse(): ?int
    {
        return $this->idclasse;
    }

    public function setIdclasse(int $idclasse): self
    {
        $this->idclasse = $idclasse;

        return $this;
    }

    public function getIdannee(): ?int
    {
        return $this->idannee;
    }

    public function setIdannee(int $idannee): self
    {
        $this->idannee = $idannee;

        return $this;
    }


}
