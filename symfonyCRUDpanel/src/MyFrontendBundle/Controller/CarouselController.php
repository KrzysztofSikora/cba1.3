<?php

namespace MyFrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MyFrontendBundle\Entity\Carousel;
use MyFrontendBundle\Form\CarouselType;
use MyFrontendBundle\Form\CarouselTypeEdit;

/**
 * Carousel controller.
 *
 * @Route("/carousel")
 */
class CarouselController extends Controller
{
    /**
     * Lists all Carousel entities.
     *
     * @Route("/", name="carousel_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $carousels = $em->getRepository('MyFrontendBundle:Carousel')->findAll();

        return $this->render('carousel/index.html.twig', array(
            'carousels' => $carousels,
        ));
    }

    /**
     * Creates a new Carousel entity.
     *
     * @Route("/new", name="carousel_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $carousel = new Carousel();
        $form = $this->createForm('MyFrontendBundle\Form\CarouselType', $carousel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
//            $em->persist($carousel);
//            $em->flush();

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $i = $carousel->getCfilename();

            if ($finfo == '' or $i == '') {
                return $this->render('carousel/new.html.twig', array(
                    'carousel' => $carousel,
                    'form' => $form->createView(),
                    'err' => 'Błędny typ danych. Wrzuć .jpg lub .png'
                ));
            }

            if (finfo_file($finfo, $i) == 'image/jpeg' or finfo_file($finfo, $i) == 'image/png') {
                $file = $carousel;
                $file->setCfilename($i->getClientOriginalName());
                $file->setCmime(finfo_file($finfo, $i));
                $file->setCcontents(base64_encode(file_get_contents($i)));
                $em->persist($file);
                $em->flush();
                finfo_close($finfo);


                return $this->redirectToRoute('carousel_show', array('id' => $carousel->getId()));
            } else {

                return $this->render('carousel/new.html.twig', array(
                    'carousel' => $carousel,
                    'form' => $form->createView(),
                    'err' => 'Błędny typ danych. Wrzuć .jpg lub .png'
                ));
            }
        }
            return $this->render('carousel/new.html.twig', array(
                'carousel' => $carousel,
                'form' => $form->createView(),
                'err' => null
            ));
        }

    /**
     * Finds and displays a Carousel entity.
     *
     * @Route("/{id}", name="carousel_show")
     * @Method("GET")
     */
    public function showAction(Carousel $carousel)
    {
        $deleteForm = $this->createDeleteForm($carousel);

        return $this->render('carousel/show.html.twig', array(
            'carousel' => $carousel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Carousel entity.
     *
     * @Route("/{id}/edit", name="carousel_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Carousel $carousel)
    {
        $deleteForm = $this->createDeleteForm($carousel);
        $editForm = $this->createForm('MyFrontendBundle\Form\CarouselTypeEdit', $carousel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($carousel);
            $em->flush();

            return $this->redirectToRoute('carousel_edit', array('id' => $carousel->getId()));
        }

        return $this->render('carousel/edit.html.twig', array(
            'carousel' => $carousel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Carousel entity.
     *
     * @Route("/{id}", name="carousel_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Carousel $carousel)
    {
        $form = $this->createDeleteForm($carousel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($carousel);
            $em->flush();
        }

        return $this->redirectToRoute('carousel_index');
    }

    /**
     * Creates a form to delete a Carousel entity.
     *
     * @param Carousel $carousel The Carousel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Carousel $carousel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('carousel_delete', array('id' => $carousel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Finds and displays a File entity.
     *
     * @Route("/download/{filename}", name="cfile_show")
     */
    public function displayAction($filename)
    {
        $em = $this->getDoctrine()->getEntityManager();

//        $entity =  new Image();
        $entity = $em->getRepository('MyFrontendBundle:Carousel')
            ->findOneByCfilename($filename);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find File entity.');
        }
        $response = new Response();
        $response->setContent(base64_decode($entity->getCcontents()));
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', $entity->getCmime());
        return $response;

//        return $this->render('image/upload.html.twig', array(
//            'mimeType' => $entity->getMime(),
//            'content' => $entity->getContents()
//
//        ));
    }
}
