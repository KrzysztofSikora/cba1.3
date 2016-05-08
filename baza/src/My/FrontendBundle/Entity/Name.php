<?php

namespace My\FrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * My\FrontendBundle\Entity\Name
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Name
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $caption
     *
     * @ORM\Column(name="caption", type="string", length=255)
     */
    private $caption;


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
     * Set caption
     *
     * @param string $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

    /**
     * Get caption
     *
     * @return string 
     */
    public function getCaption()
    {
        return $this->caption;
    }
}