<?php

namespace MyFrontendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Album
 *
 * @ORM\Table(name="album")
 * @ORM\Entity(repositoryClass="MyFrontendBundle\Repository\AlbumRepository")
 */
class Album
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
     *
     * @ORM\OneToMany(targetEntity="Image", mappedBy="album")
     * 
     */
    private $albumname;
    
    /**
     * @var string
     *
     * @ORM\Column(name="filenamee", type="string", length=255)
     */
    private $filenamee;

    
    /**
     * @var string
     *
     * @ORM\Column(name="mimee", type="string", length=255)
     */
    private $mimee;

    /**
     * @var string
     *
     * @ORM\Column(name="contentss", type="text")
     */
    private $contentss;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionn", type="string", length=255)
     */
    private $descriptionn;


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
     * Set filenamee
     *
     * @param string $filenamee
     * @return Album
     */
    public function setFilenamee($filenamee)
    {
        $this->filenamee = $filenamee;

        return $this;
    }

    /**
     * Get filenamee
     *
     * @return string 
     */
    public function getFilenamee()
    {
        return $this->filenamee;
    }

    /**
     * Set mimee
     *
     * @param string $mimee
     * @return Album
     */
    public function setMimee($mimee)
    {
        $this->mimee = $mimee;

        return $this;
    }

    /**
     * Get mimee
     *
     * @return string 
     */
    public function getMimee()
    {
        return $this->mimee;
    }

    /**
     * Set contentss
     *
     * @param string $contentss
     * @return Album
     */
    public function setContentss($contentss)
    {
        $this->contentss = $contentss;

        return $this;
    }

    /**
     * Get contentss
     *
     * @return string 
     */
    public function getContentss()
    {
        return $this->contentss;
    }

    /**
     * Set descriptionn
     *
     * @param string $descriptionn
     * @return Album
     */
    public function setDescriptionn($descriptionn)
    {
        $this->descriptionn = $descriptionn;

        return $this;
    }

    /**
     * Get descriptionn
     *
     * @return string 
     */
    public function getDescriptionn()
    {
        return $this->descriptionn;
    }

    /**
     * Set albumname
     *
     * @param string $albumname
     * @return Album
     */
    public function setAlbumname($albumname)
    {
        $this->albumname = $albumname;

        return $this;
    }

    /**
     * Get albumname
     *
     * @return string 
     */
    public function getAlbumname()
    {
        return $this->albumname;
    }


    
    public function __toString()
    {

//         $a = $this->getContentss();
        $z = $this->getDescriptionn();
//        $i = $this->getFilenamee();
//        $o = $this->getMimee();
//        $l = $this->getId();
        return "$z";
    }



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->albumname = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add albumname
     *
     * @param \MyFrontendBundle\Entity\Image $albumname
     * @return Album
     */
    public function addAlbumname(\MyFrontendBundle\Entity\Image $albumname)
    {
        $this->albumname[] = $albumname;

        return $this;
    }

    /**
     * Remove albumname
     *
     * @param \MyFrontendBundle\Entity\Image $albumname
     */
    public function removeAlbumname(\MyFrontendBundle\Entity\Image $albumname)
    {
        $this->albumname->removeElement($albumname);
    }
}
