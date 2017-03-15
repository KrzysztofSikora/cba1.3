<?php

namespace FrontSupportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Squad
 *
 * @ORM\Table(name="squad")
 * @ORM\Entity(repositoryClass="FrontSupportBundle\Repository\SquadRepository")
 */
class Squad
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
     * @var string
     *
     * @ORM\Column(name="filenameee", type="string", length=255)
     */
    private $filenameee;

    /**
     * @var string
     *
     * @ORM\Column(name="mimeee", type="string", length=255)
     */
    private $mimeee;

   
    
    /**
     * @var string
     *
     * @ORM\Column(name="contentsss", type="text")
     */
    private $contentsss;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionnn", type="string", length=255)
     */
    private $descriptionnn;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text")
     */
    private $info;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;


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
     * Set filenameee
     *
     * @param string $filenameee
     * @return Squad
     */
    public function setFilenameee($filenameee)
    {
        $this->filenameee = $filenameee;

        return $this;
    }

    /**
     * Get filenameee
     *
     * @return string 
     */
    public function getFilenameee()
    {
        return $this->filenameee;
    }

    /**
     * Set mimeee
     *
     * @param string $mimeee
     * @return Squad
     */
    public function setMimeee($mimeee)
    {
        $this->mimeee = $mimeee;

        return $this;
    }

    /**
     * Get mimeee
     *
     * @return string 
     */
    public function getMimeee()
    {
        return $this->mimeee;
    }

    /**
     * Set contentsss
     *
     * @param string $contentsss
     * @return Squad
     */
    public function setContentsss($contentsss)
    {
        $this->contentsss = $contentsss;

        return $this;
    }

    /**
     * Get contentsss
     *
     * @return string 
     */
    public function getContentsss()
    {
        return $this->contentsss;
    }

    /**
     * Set descriptionnn
     *
     * @param string $descriptionnn
     * @return Squad
     */
    public function setDescriptionnn($descriptionnn)
    {
        $this->descriptionnn = $descriptionnn;

        return $this;
    }

    /**
     * Get descriptionnn
     *
     * @return string 
     */
    public function getDescriptionnn()
    {
        return $this->descriptionnn;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Squad
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set info
     *
     * @param string $info
     * @return Squad
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Squad
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    public function __toString()
    {
        $p = $this->getPosition();

        return "$p";
    }
}
