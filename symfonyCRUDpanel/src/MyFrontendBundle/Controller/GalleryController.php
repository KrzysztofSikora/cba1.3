<?php

namespace MyFrontendBundle\Controller;

use MyFrontendBundle\Entity\Album;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MyFrontendBundle\Entity\Image;
use MyFrontendBundle\Form\ImageType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class GalleryController extends Controller
{
    /**
     * Lista wszystkich filmow
     *
     * @Route("/albums", name="film_index")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $entities = $em->getRepository('MyFrontendBundle:Album')->findAll();
        return array('entities' => $entities);

    }

    /**
     * Szczegolowe dane filmu
     *
     * @Route("/film/{id}.html", name="film_show")
     * @Template()
     */

    public function showAction($id)
    {
       $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('MyFrontendBundle:Image')->findByAlbum($id);

        if (!$entity) {
//            throw $this->createNotFoundException('Brak filmu o podanym id!');

        }


        return $this->render('MyFrontendBundle:Gallery:show.html.twig', array('entity' => $entity));


//       return array('entity' => $entity);
    }



}
