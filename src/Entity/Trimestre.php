<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trimestre
 *
 * @ORM\Table(name="trimestre")
 * @ORM\Entity
 */
class Trimestre
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="id", type="bigint", nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=false)
     */
    private $value;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

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
