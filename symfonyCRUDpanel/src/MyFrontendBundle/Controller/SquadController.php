<?php

namespace MyFrontendBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use MyFrontendBundle\Entity\Squad;
use MyFrontendBundle\Form\SquadType;
use MyFrontendBundle\Form\SquadTypeEdit;

/**
 * Squad controller.
 *
 * @Route("/squad")
 */
class SquadController extends Controller
{
    /**
     * Lists all Squad entities.
     *
     * @Route("/", name="squad_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $squads = $em->getRepository('MyFrontendBundle:Squad')->findAll();

        return $this->render('squad/index.html.twig', array(
            'squads' => $squads,
        ));
    }

    /**
     * Creates a new Squad entity.
     *
     * @Route("/new", name="squad_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $squad = new Squad();
        $form = $this->createForm('MyFrontendBundle\Form\SquadType', $squad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
//            $em->persist($squad);
//            $em->flush();

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $i = $squad->getFilenameee();

            if ($finfo == '' or $i == '') {
                return $this->render('squad/new.html.twig', array(
                    'squad' => $squad,
                    'form' => $form->createView(),
                    'err' => 'Błędny typ danych. Wrzuć .jpg lub .png'
                ));
            }

            if (finfo_file($finfo, $i) == 'image/jpeg' or finfo_file($finfo, $i) == 'image/png') {

                $file = $squad;
                $file->setFilenameee($i->getClientOriginalName());
                $file->setMimeee(finfo_file($finfo, $i));
                $file->setContentsss(base64_encode(file_get_contents($i)));
                $em->persist($file);
                $em->flush();
                finfo_close($finfo);


                return $this->redirectToRoute('squad_show', array('id' => $squad->getId()));
            } else {
                return $this->render('squad/new.html.twig', array(
                    'squad' => $squad,
                    'form' => $form->createView(),
                    'err' => 'Błędny typ danych. Wrzuć .jpg lub .png'
                ));
            }
        }

        return $this->render('squad/new.html.twig', array(
            'squad' => $squad,
            'form' => $form->createView(),
            'err' => null
        ));
    }

    /**
     * Finds and displays a Squad entity.
     *
     * @Route("/{id}", name="squad_show")
     * @Method("GET")
     */
    public function showAction(Squad $squad)
    {
        $deleteForm = $this->createDeleteForm($squad);

        return $this->render('squad/show.html.twig', array(
            'squad' => $squad,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Squad entity.
     *
     * @Route("/{id}/edit", name="squad_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Squad $squad)
    {
        $deleteForm = $this->createDeleteForm($squad);
        $editForm = $this->createForm('MyFrontendBundle\Form\SquadTypeEdit', $squad);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($squad);
            $em->flush();

            return $this->redirectToRoute('squad_edit', array('id' => $squad->getId()));
        }

        return $this->render('squad/edit.html.twig', array(
            'squad' => $squad,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Squad entity.
     *
     * @Route("/{id}", name="squad_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Squad $squad)
    {
        $form = $this->createDeleteForm($squad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($squad);
            $em->flush();
        }

        return $this->redirectToRoute('squad_index');
    }

    /**
     * Creates a form to delete a Squad entity.
     *
     * @param Squad $squad The Squad entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Squad $squad)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('squad_delete', array('id' => $squad->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Finds and displays a File entity.
     *
     * @Route("/download/{filename}", name="fileee_show")
     */
    public function displayAction($filename)
    {
        $em = $this->getDoctrine()->getEntityManager();

//        $entity =  new Image();
        $entity = $em->getRepository('MyFrontendBundle:Squad')
            ->findOneByFilenameee($filename);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find File entity.');
        }
        $response = new Response();
        $response->setContent(base64_decode($entity->getContentsss()));
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', $entity->getMimeee());
        return $response;

//        return $this->render('image/upload.html.twig', array(
//            'mimeType' => $entity->getMime(),
//            'content' => $entity->getContents()
//
//        ));
    }
}
