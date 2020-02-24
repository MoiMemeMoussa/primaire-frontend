<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enseignant
 *
 * @ORM\Table(name="enseignant")
 * @ORM\Entity
 */
class Enseignant
{
    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=11, nullable=false)
     */
    private $matricule;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=10, nullable=false, options={"comment"="M. ou MLLE ou MME"})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     * @var int
     *
     * @ORM\Column(name="phone", type="integer", nullable=false)
     */
    private $phone;


}
