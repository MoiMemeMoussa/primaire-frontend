<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notes
 *
 * @ORM\Table(name="notes", indexes={@ORM\Index(name="FKsu9h8ja7p96toarvl07yhr99h", columns={"id_annee", "id_classe", "id_matiere"})})
 * @ORM\Entity
 */
class Notes
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_matiere", type="integer", nullable=false)
     */
    private $idmatiere;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_eleve", type="integer", nullable=false)
     */
    private $ideleve;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_classe", type="integer", nullable=false)
     */
    private $idclasse;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id_annee", type="integer", nullable=false)
     */
    private $idannee;

    /**
     * @var int|null
     *
     * @ORM\Column(name="value", type="integer", nullable=true)
     */
    private $value;

    public function getIdmatiere(): ?int
    {
        return $this->idmatiere;
    }

    public function setIdmatiere(int $idmatiere): self
    {
        $this->idmatiere = $idmatiere;

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

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(?int $value): self
    {
        $this->value = $value;

        return $this;
    }


}
