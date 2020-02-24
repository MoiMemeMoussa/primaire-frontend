<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matiere
 *
 * @ORM\Table(name="matiere")
 * @ORM\Entity
 */
class Matiere
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMatiere", type="integer", nullable=false)
     */
    private $idmatiere;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    public function getIdmatiere(): ?int
    {
        return $this->idmatiere;
    }

    public function setIdmatiere(int $idmatiere): self
    {
        $this->idmatiere = $idmatiere;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


}
