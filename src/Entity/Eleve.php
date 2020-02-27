<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity
 */
class Eleve
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(name="idEleve", type="integer", nullable=false)
     */
    private $ideleve;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthDate", type="date", nullable=false)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="father", type="string", length=255, nullable=false)
     */
    private $father;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=8, nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="mother", type="string", length=255, nullable=false)
     */
    private $mother;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string", length=40, nullable=false)
     */
    private $place;

    public function getIdeleve(): ?int
    {
        return $this->ideleve;
    }

    public function setIdeleve(int $ideleve): self
    {
        $this->ideleve = $ideleve;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getFather(): ?string
    {
        return $this->father;
    }

    public function setFather(string $father): self
    {
        $this->father = $father;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getMother(): ?string
    {
        return $this->mother;
    }

    public function setMother(string $mother): self
    {
        $this->mother = $mother;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }


}
