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
     * @ORM\Id
     * @ORM\Column(name="matricule", type="string", length=255, nullable=false)
     */
    private $matricule;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="idClasse", type="integer", nullable=false)
     */
    private $idclasse;

    /**
     * @var string
     *
     * @ORM\Id
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

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

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

    public function getIdannee(): ?string
    {
        return $this->idannee;
    }

    public function setIdannee(string $idannee): self
    {
        $this->idannee = $idannee;

        return $this;
    }

    public function getEnddate(): ?\DateTimeInterface
    {
        return $this->enddate;
    }

    public function setEnddate(?\DateTimeInterface $enddate): self
    {
        $this->enddate = $enddate;

        return $this;
    }

    public function getStartdate(): ?\DateTimeInterface
    {
        return $this->startdate;
    }

    public function setStartdate(?\DateTimeInterface $startdate): self
    {
        $this->startdate = $startdate;

        return $this;
    }


}
