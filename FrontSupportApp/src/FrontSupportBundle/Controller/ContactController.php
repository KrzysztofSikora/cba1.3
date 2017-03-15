<?php

namespace FrontSupportBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FrontSupportBundle\Entity\Contact;
use FrontSupportBundle\Form\ContactType;
use FrontSupportBundle\Form\ContactTypeEdit;

/**
 * Contact controller.
 *
 * @Route("/contact")
 */
class ContactController extends Controller
{
    /**
     * Lists all Contact entities.
     *
     * @Route("/", name="contact_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contacts = $em->getRepository('FrontSupportBundle:Contact')->findAll();

        return $this->render('contact/index.html.twig', array(
            'contacts' => $contacts,
        ));
    }

    /**
     * Creates a new Contact entity.
     *
     * @Route("/new", name="contact_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->createForm('FrontSupportBundle\Form\ContactType', $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
//            $em->persist($contact);
//            $em->flush();

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $i = $contact->getCofilename();

            if ($finfo == '' or $i == '') {
                return $this->render('contact/new.html.twig', array(
                    'contact' => $contact,
                    'form' => $form->createView(),
                    'err' => 'Błędny typ danych. Wrzuć .jpg lub .png'
                ));
            }


            if (finfo_file($finfo, $i) == 'image/jpeg' or finfo_file($finfo, $i) == 'image/png') {

                $file = $contact;
                $file->setCofilename($i->getClientOriginalName());
                $file->setConmime(finfo_file($finfo, $i));
                $file->setCocontents(base64_encode(file_get_contents($i)));
                $em->persist($file);
                $em->flush();
                finfo_close($finfo);


                return $this->redirectToRoute('contact_show', array('id' => $contact->getId()));
            } else {

//
                return $this->render('contact/new.html.twig', array(
                    'contact' => $contact,
                    'form' => $form->createView(),
                    'err' => 'Błędny typ danych. Wrzuć .jpg lub .png'
                ));
            }
        }
            return $this->render('contact/new.html.twig', array(
                'contact' => $contact,
                'form' => $form->createView(),
                'err' => null,
            ));

    }

    /**
     * Finds and displays a Contact entity.
     *
     * @Route("/{id}", name="contact_show")
     * @Method("GET")
     */
    public function showAction(Contact $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);

        return $this->render('contact/show.html.twig', array(
            'contact' => $contact,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Contact entity.
     *
     * @Route("/{id}/edit", name="contact_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Contact $contact)
    {
        $deleteForm = $this->createDeleteForm($contact);
        $editForm = $this->createForm('FrontSupportBundle\Form\ContactTypeEdit', $contact);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            return $this->redirectToRoute('contact_edit', array('id' => $contact->getId()));
        }

        return $this->render('contact/edit.html.twig', array(
            'contact' => $contact,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contact entity.
     *
     * @Route("/{id}", name="contact_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Contact $contact)
    {
        $form = $this->createDeleteForm($contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contact);
            $em->flush();
        }

        return $this->redirectToRoute('contact_index');
    }

    /**
     * Creates a form to delete a Contact entity.
     *
     * @param Contact $contact The Contact entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contact $contact)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contact_delete', array('id' => $contact->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Finds and displays a File entity.
     *
     * @Route("/download/{filename}", name="confile_show")
     */
    public function displayAction($filename)
    {
        $em = $this->getDoctrine()->getEntityManager();


        $entity = $em->getRepository('FrontSupportBundle:Contact')
            ->findOneByCofilename($filename);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find File entity.');
        }
        $response = new Response();
        $response->setContent(base64_decode($entity->getCocontents()));
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', $entity->getConmime());
        return $response;

    }
}
