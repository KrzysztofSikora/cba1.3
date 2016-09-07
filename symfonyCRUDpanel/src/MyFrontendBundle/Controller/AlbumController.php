<?php

namespace MyFrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MyFrontendBundle\Entity\Album;
use MyFrontendBundle\Form\AlbumType;
use MyFrontendBundle\Form\AlbumTypeEdit;
use Symfony\Component\HttpFoundation\Response;

/**
 * Album controller.
 *
 * @Route("/album")
 */
class AlbumController extends Controller
{
    /**
     * Lists all Album entities.
     *
     * @Route("/", name="album_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $albums = $em->getRepository('MyFrontendBundle:Album')->findAll();

        return $this->render('album/index.html.twig', array(
            'albums' => $albums,
        ));
    }

    /**
     * Creates a new Album entity.
     *
     * @Route("/new", name="album_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $album = new Album();
        $form = $this->createForm('MyFrontendBundle\Form\AlbumType', $album);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
//            $em->persist($album);
//            $em->flush();


            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $i = $album->getFilenamee();


            if ($finfo == '' or $i == '') {
                return $this->render('album/new.html.twig', array(
                    'album' => $album,
                    'form' => $form->createView(),
                    'err' => 'Błędny typ danych. Wrzuć .jpg lub .png'
                ));
            }

            if (finfo_file($finfo, $i) == 'image/jpeg' or finfo_file($finfo, $i) == 'image/png') {
                $file = $album;
                $file->setFilenamee($i->getClientOriginalName());
                $file->setMimee(finfo_file($finfo, $i));
                $file->setContentss(base64_encode(file_get_contents($i)));
                $em->persist($file);
                $em->flush();
                finfo_close($finfo);


                return $this->redirectToRoute('album_show', array('id' => $album->getId()));


            } else {
                return $this->render('album/new.html.twig', array(
                    'album' => $album,
                    'form' => $form->createView(),
                    'err' => 'Błędny typ danych. Wrzuć .jpg lub .png'
                ));
            }
        }
        return $this->render('album/new.html.twig', array(
            'album' => $album,
            'form' => $form->createView(),
            'err' => null,
        ));
    }

    /**
     * Finds and displays a Album entity.
     *
     * @Route("/{id}", name="album_show")
     * @Method("GET")
     */
    public function showAction(Album $album)
    {
        $deleteForm = $this->createDeleteForm($album);

        return $this->render('album/show.html.twig', array(
            'album' => $album,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Album entity.
     *
     * @Route("/{id}/edit", name="album_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Album $album)
    {
        $deleteForm = $this->createDeleteForm($album);
        $editForm = $this->createForm('MyFrontendBundle\Form\AlbumTypeEdit', $album);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($album);
            $em->flush();

            return $this->redirectToRoute('album_edit', array('id' => $album->getId()));
        }

        return $this->render('album/edit.html.twig', array(
            'album' => $album,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Album entity.
     *
     * @Route("/{id}", name="album_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Album $album)
    {
        $form = $this->createDeleteForm($album);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($album);
            $em->flush();
        }

        return $this->redirectToRoute('album_index');
    }

    /**
     * Creates a form to delete a Album entity.
     *
     * @param Album $album The Album entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Album $album)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('album_delete', array('id' => $album->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Finds and displays a File entity.
     *
     * @Route("/download/{filename}", name="filee_show")
     */
    

    public function displayAction($filename)
    {
        $em = $this->getDoctrine()->getEntityManager();

//        $entity =  new Image();
        $entity = $em->getRepository('MyFrontendBundle:Album')
            ->findOneByFilenamee($filename);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find File entity.');
        }
        $response = new Response();
        $response->setContent(base64_decode($entity->getContentss()));
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', $entity->getMimee());
        return $response;

//        return $this->render('image/upload.html.twig', array(
//            'mimeType' => $entity->getMime(),
//            'content' => $entity->getContents()
//
//        ));
    }
}
