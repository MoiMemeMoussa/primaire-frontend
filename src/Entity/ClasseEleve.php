<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClasseEleve
 *
 * @ORM\Table(name="classe_eleve", indexes={@ORM\Index(name="FKiowrav8chudx14v2fv7nni8bo", columns={"idEleve"})})
 * @ORM\Entity
 */
class ClasseEleve
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
     * @ORM\Column(name="idEleve", type="integer", nullable=false)
     */
    private $ideleve;

    /**
     * @var int
     *
     * @ORM\Column(name="idAnnee", type="integer", nullable=false)
     */
    private $idannee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="status", type="string", length=255, nullable=true)
     */
    private $status;

    public function getIdclasse(): ?int
    {
        return $this->idclasse;
    }

    public function setIdclasse(int $idclasse): self
    {
        $this->idclasse = $idclasse;

        return $this;
    }

    public function getIdeleve(): ?int
    {
        return $this->ideleve;
    }

    public function setIdeleve(int $ideleve): self
    {
        $this->ideleve = $ideleve;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }


}
