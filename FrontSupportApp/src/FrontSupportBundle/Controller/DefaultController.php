<?php

namespace FrontSupportBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller

{
    /**
     * @Route("/", name="main_index")
     */
    public function indexAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT a FROM FrontSupportBundle:Tasks a ORDER By a.posted DESC";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );


        return $this->render('FrontSupportBundle:Default:index.html.twig', array('pagination' => $pagination));

    }

    /**
     * @Route("/history", name="history_index")
     */
    public function historyAction(Request $request)
    {


        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT a FROM FrontSupportBundle:Story a ORDER By a.position ASC";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );


        return $this->render('FrontSupportBundle:Default:history.html.twig', array('pagination' => $pagination));


    }


    /**
     * @Route("/con", name="con_index")
     */
    public function contactAction(Request $request)
    {


        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT a FROM FrontSupportBundle:Contact a ORDER By a.position ASC";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );


        return $this->render('FrontSupportBundle:Default:contact.html.twig', array('pagination' => $pagination));


    }

    /**
     * @Route("/gallery")
     */

    public function galleryAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT a FROM FrontSupportBundle:Image a";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            16/*limit per page*/
        );


        return $this->render('FrontSupportBundle:Default:gallery.html.twig', array('pagination' => $pagination));
    }


    /**
     * @Route("/panel", name="panel_index")
     */
    public function panelAction()
    {


        return $this->render('FrontSupportBundle:Default:panel.html.twig');
    }


    /**
     * @Route("/members",name="members_index")
     */
    public function membersAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT a FROM FrontSupportBundle:Squad a ORDER By a.position ASC";
        $query = $em->createQuery($dql);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            4/*limit per page*/
        );


        return $this->render('FrontSupportBundle:Default:members.html.twig', array('pagination' => $pagination));

    }
}
