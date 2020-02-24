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
     * @ORM\Column(name="id", type="bigint", nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=255, nullable=false)
     */
    private $value;


}
