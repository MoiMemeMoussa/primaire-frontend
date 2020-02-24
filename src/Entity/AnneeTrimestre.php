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

    public function getIdannee(): ?int
    {
        return $this->idannee;
    }

    public function setIdannee(int $idannee): self
    {
        $this->idannee = $idannee;

        return $this;
    }

    public function getIdtrimestre(): ?int
    {
        return $this->idtrimestre;
    }

    public function setIdtrimestre(int $idtrimestre): self
    {
        $this->idtrimestre = $idtrimestre;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }


}
