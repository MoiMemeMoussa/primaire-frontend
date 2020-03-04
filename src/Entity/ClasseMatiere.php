<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClasseMatiere
 *
 * @ORM\Table(name="classe_matiere", indexes={@ORM\Index(name="FK2g14280y7mdao7gubk7ega9do", columns={"id_matiere"})})
 * @ORM\Entity
 */
class ClasseMatiere
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
     * @ORM\Column(name="idMatiere", type="integer", nullable=false)
     */
    private $idmatiere;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="idAnnee", type="integer", nullable=false)
     */
    private $idannee;

    /**
     * @var int|null
     *
     * @ORM\Column(name="bareme", type="integer", nullable=true)
     */
    private $bareme;

    public function getIdclasse(): ?int
    {
        return $this->idclasse;
    }

    public function setIdclasse(int $idclasse): self
    {
        $this->idclasse = $idclasse;

        return $this;
    }

    public function getIdmatiere(): ?int
    {
        return $this->idmatiere;
    }

    public function setIdmatiere(int $idmatiere): self
    {
        $this->idmatiere = $idmatiere;

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

    public function getBareme(): ?int
    {
        return $this->bareme;
    }

    public function setBareme(?int $bareme): self
    {
        $this->bareme = $bareme;

        return $this;
    }


}
