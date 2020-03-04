<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EleveMatricule
 *
 * @ORM\Table(name="eleve_matricule", indexes={@ORM\Index(name="FK8bmviioemr7qp9hsa2p72grqp", columns={"id_matricule"})})
 * @ORM\Entity
 */
class EleveMatricule
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="idEleve", type="integer", nullable=false)
     */
    private $ideleve;

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
     * @ORM\Column(name="idAnnee", type="integer", nullable=false)
     */
    private $idannee;

    /**
     * @var int
     *
     * @ORM\Column(name="idMatricule", type="integer", nullable=false)
     */
    private $idmatricule;

    public function getIdeleve(): ?int
    {
        return $this->ideleve;
    }

    public function setIdeleve(int $ideleve): self
    {
        $this->ideleve = $ideleve;

        return $this;
    }

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

    public function getIdmatricule(): ?int
    {
        return $this->idmatricule;
    }

    public function setIdmatricule(int $idmatricule): self
    {
        $this->idmatricule = $idmatricule;

        return $this;
    }


}
