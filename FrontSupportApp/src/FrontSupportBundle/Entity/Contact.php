<?php

namespace FrontSupportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="FrontSupportBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="cofilename", type="string", length=255)
     */
    private $cofilename;

    /**
     * @var string
     *
     * @ORM\Column(name="conmime", type="string", length=255)
     */
    private $conmime;

    /**
     * @var string
     *
     * @ORM\Column(name="cocontents", type="text")
     */
    private $cocontents;

    /**
     * @var string
     *
     * @ORM\Column(name="condescription", type="string", length=255)
     */
    private $condescription;

    /**
     * @var string
     *
     * @ORM\Column(name="conname", type="string", length=255)
     */
    private $conname;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=255)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="meil", type="string", length=255)
     */
    private $meil;

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
     * Set cofilename
     *
     * @param string $cofilename
     * @return Contact
     */
    public function setCofilename($cofilename)
    {
        $this->cofilename = $cofilename;

        return $this;
    }

    /**
     * Get cofilename
     *
     * @return string 
     */
    public function getCofilename()
    {
        return $this->cofilename;
    }

    /**
     * Set conmime
     *
     * @param string $conmime
     * @return Contact
     */
    public function setConmime($conmime)
    {
        $this->conmime = $conmime;

        return $this;
    }

    /**
     * Get conmime
     *
     * @return string 
     */
    public function getConmime()
    {
        return $this->conmime;
    }

    /**
     * Set cocontents
     *
     * @param string $cocontents
     * @return Contact
     */
    public function setCocontents($cocontents)
    {
        $this->cocontents = $cocontents;

        return $this;
    }

    /**
     * Get cocontents
     *
     * @return string 
     */
    public function getCocontents()
    {
        return $this->cocontents;
    }

    /**
     * Set condescription
     *
     * @param string $condescription
     * @return Contact
     */
    public function setCondescription($condescription)
    {
        $this->condescription = $condescription;

        return $this;
    }

    /**
     * Get condescription
     *
     * @return string 
     */
    public function getCondescription()
    {
        return $this->condescription;
    }

    /**
     * Set conname
     *
     * @param string $conname
     * @return Contact
     */
    public function setConname($conname)
    {
        $this->conname = $conname;

        return $this;
    }

    /**
     * Get conname
     *
     * @return string 
     */
    public function getConname()
    {
        return $this->conname;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Contact
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set meil
     *
     * @param string $meil
     * @return Contact
     */
    public function setMeil($meil)
    {
        $this->meil = $meil;

        return $this;
    }

    /**
     * Get meil
     *
     * @return string 
     */
    public function getMeil()
    {
        return $this->meil;
    }



    /**
     * Set position
     *
     * @param integer $position
     * @return Contact
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
        $pp = $this->getPosition();

        return "$pp";
    }
}
