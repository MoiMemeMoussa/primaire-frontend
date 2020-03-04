<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Annee
 *
 * @ORM\Table(name="annee")
 * @ORM\Entity
 */
class Annee
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="idAnnee", type="integer", nullable=false)
     */
    private $idannee;

    /**
     * @var string|null
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=true)
     */
    private $value;

    private $classes;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
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

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(?string $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getClasses()
    {
        return $this->classes;
    }

    public function setClasses(array $classes)
    {
        $this->classes = $classes;

        return $this;
    }

    public function addClass(Classe $class)
    {
        $this->classes->add($class);
    }
}
