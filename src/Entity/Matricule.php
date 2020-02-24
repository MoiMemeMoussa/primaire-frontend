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

    public function getIdmatricule(): ?int
    {
        return $this->idmatricule;
    }

    public function setIdmatricule(int $idmatricule): self
    {
        $this->idmatricule = $idmatricule;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }


}
