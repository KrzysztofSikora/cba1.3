<?php

namespace MyFrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * t
 *
 * @ORM\Table(name="t")
 * @ORM\Entity(repositoryClass="MyFrontendBundle\Repository\tRepository")
 */
class t
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="d", type="datetime")
     */
    private $d;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set d
     *
     * @param \DateTime $d
     * @return t
     */
    public function setD($d)
    {
        $this->d = $d;

        return $this;
    }

    /**
     * Get d
     *
     * @return \DateTime 
     */
    public function getD()
    {
        return $this->d;
    }
}
