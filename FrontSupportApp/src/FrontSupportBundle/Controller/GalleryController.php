<?php

namespace FrontSupportBundle\Controller;

use FrontSupportBundle\Entity\Album;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FrontSupportBundle\Entity\Image;
use FrontSupportBundle\Form\ImageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class GalleryController extends Controller
{
    /**
     * Lista wszystkich pictureow
     *
     * @Route("/albums", name="picture_index")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('FrontSupportBundle:Album')->findAll();
        return array('entities' => $entities);

    }

    /**
     * Szczegolowe dane pictureu
     *
     * @Route("/picture/{id}.html", name="picture_show")
     * @Template()
     */

    public function showAction($id)
    {
       $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('FrontSupportBundle:Image')->findByAlbum($id);

        if (!$entity) {

        }


        return $this->render('FrontSupportBundle:Gallery:show.html.twig', array('entity' => $entity));


    }



}
