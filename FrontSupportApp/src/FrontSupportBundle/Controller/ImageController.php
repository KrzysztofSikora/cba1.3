<?php

namespace FrontSupportBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FrontSupportBundle\Entity\Image;
use FrontSupportBundle\Form\ImageType;
use FrontSupportBundle\Form\ImageTypeEdit;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Image controller.
 *
 * @Route("/image")
 */
class ImageController extends Controller
{
    /**
     * Lists all Image entities.
     *
     * @Route("/", name="image_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $images = $em->getRepository('FrontSupportBundle:Image')->findAll();

        return $this->render('image/index.html.twig', array(
            'images' => $images,
        ));
    }

    /**
     * Creates a new Image entity.
     *
     * @Route("/new", name="image_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $image = new Image();
        $form = $this->createForm('FrontSupportBundle\Form\ImageType', $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $finfo = finfo_open(FILEINFO_MIME_TYPE);


            $i = $image->getFilename();
            if ($finfo == '' or $i == '') {
                return $this->render('image/new.html.twig', array(
                    'image' => $image,
                    'form' => $form->createView(),
                    'err' => 'Błędny typ danych. Wrzuć .jpg lub .png'
                ));
            }
            if (finfo_file($finfo, $i) == 'image/jpeg' or finfo_file($finfo, $i) == 'image/png') {
                $file = $image;
                $file->setFilename($i->getClientOriginalName());
                $file->setMime(finfo_file($finfo, $i));
                $file->setContents(base64_encode(file_get_contents($i)));


                $em->persist($file);
                $em->flush();
                finfo_close($finfo);
                return $this->redirectToRoute('image_show', array('id' => $image->getId()));

            } else {
                return $this->render('image/new.html.twig', array(
                    'image' => $image,
                    'form' => $form->createView(),
                    'err' => 'Błędny typ danych. Wrzuć .jpg lub .png'
                ));
            }


        }

        return $this->render('image/new.html.twig', array(
            'image' => $image,
            'form' => $form->createView(),
            'err' => null
        ));
    }

    /**
     * Finds and displays a Image entity.
     *
     * @Route("/{id}", name="image_show")
     * @Method("GET")
     */
    public function showAction(Image $image)
    {
        $deleteForm = $this->createDeleteForm($image);

        return $this->render('image/show.html.twig', array(
            'image' => $image,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Image entity.
     *
     * @Route("/{id}/edit", name="image_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Image $image)
    {
        $deleteForm = $this->createDeleteForm($image);
        $editForm = $this->createForm('FrontSupportBundle\Form\ImageTypeEdit', $image);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($image);
            $em->flush();

            return $this->redirectToRoute('image_edit', array('id' => $image->getId()));
        }

        return $this->render('image/edit.html.twig', array(
            'image' => $image,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Image entity.
     *
     * @Route("/{id}", name="image_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Image $image)
    {
        $form = $this->createDeleteForm($image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($image);
            $em->flush();
        }

        return $this->redirectToRoute('image_index');
    }

    /**
     * Creates a form to delete a Image entity.
     *
     * @param Image $image The Image entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Image $image)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('image_delete', array('id' => $image->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * Finds and displays a File entity.
     *
     * @Route("/download/{filename}", name="file_show")
     */
    public function displayAction($filename)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('FrontSupportBundle:Image')
            ->findOneByFilename($filename);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find File entity.');
        }
        $response = new Response();
        $response->setContent(base64_decode($entity->getContents()));
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', $entity->getMime());
        return $response;


    }

    public function carouselAction()
    {
        $em = $this->getDoctrine()->getManager();

        $images = $em->getRepository('FrontSupportBundle:Carousel')->findAll();

        return $this->render('FrontSupportBundle:Default:carousel.html.twig', array(
            'images' => $images,
        ));


    }

}
