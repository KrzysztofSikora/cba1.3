<?php

namespace FrontSupportBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carousel
 *
 * @ORM\Table(name="carousel")
 * @ORM\Entity(repositoryClass="FrontSupportBundle\Repository\CarouselRepository")
 */
class Carousel
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
     * @ORM\Column(name="cfilename", type="string", length=255)
     */
    private $cfilename;

    /**
     * @var string
     *
     * @ORM\Column(name="cmime", type="string", length=255)
     */
    private $cmime;

    /**
     * @var string
     *
     * @ORM\Column(name="ccontents", type="text")
     */
    private $ccontents;


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
     * Set cfilename
     *
     * @param string $cfilename
     * @return Carousel
     */
    public function setCfilename($cfilename)
    {
        $this->cfilename = $cfilename;

        return $this;
    }

    /**
     * Get cfilename
     *
     * @return string 
     */
    public function getCfilename()
    {
        return $this->cfilename;
    }

    /**
     * Set cmime
     *
     * @param string $cmime
     * @return Carousel
     */
    public function setCmime($cmime)
    {
        $this->cmime = $cmime;

        return $this;
    }

    /**
     * Get cmime
     *
     * @return string 
     */
    public function getCmime()
    {
        return $this->cmime;
    }

    /**
     * Set ccontents
     *
     * @param string $ccontents
     * @return Carousel
     */
    public function setCcontents($ccontents)
    {
        $this->ccontents = $ccontents;

        return $this;
    }

    /**
     * Get ccontents
     *
     * @return string 
     */
    public function getCcontents()
    {
        return $this->ccontents;
    }
}
