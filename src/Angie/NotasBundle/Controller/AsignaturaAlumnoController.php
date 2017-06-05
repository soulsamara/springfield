<?php

namespace Angie\NotasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Angie\NotasBundle\Entity\AsignaturaAlumno;
use Angie\NotasBundle\Form\AsignaturaAlumnoForm;
use Symfony\Component\HttpFoundation\Request;

class AsignaturaAlumnoController extends Controller
{
    /**
     * @Route("/homeasignaturaalumno", name="homeasignaturaalumno")
     */
    public function indexAction()
    {
         $list = $this->getDoctrine()
            ->getRepository('AngieNotasBundle:AsignaturaAlumno')
            ->findBy(
                array(), 
                array('id'=>'desc')
            );
    
        return $this->render('AngieNotasBundle:AsignaturaAlumno:index.html.twig', array(
            'list' => $list
        ));
    }

    /**
     * @Route("/editasignaturaalumno/{asignaturaalumnoId}", name="editasignaturaalumno")
     */
    public function editAction($asignaturaalumnoId, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $asignaturaalumno = $em->getRepository('AngieNotasBundle:AsignaturaAlumno')->find($asignaturaalumnoId);

        if (!$asignaturaalumno) {
            throw $this->createNotFoundException(
                'No tipousuario found for id ' . $asignaturaalumnoId
            );
        }

        $form = $this->createForm(AsignaturaAlumnoForm::class, $asignaturaalumno, array( 'action' => $this->generateUrl('editasignaturaalumno', array('asignaturaalumnoId' => $asignaturaalumnoId) )));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$user = $this->container->get('security.token_storage')->getToken()->getUser();
            //$username = $user->getUsername();
            
            $asignaturaalumno = $form->getData();
            //$asignaturaalumno->setAsignatura($username);
            //$asignaturaalumno->setDate(new \DateTime());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignaturaalumno);
            $em->flush();

            return $this->redirectToRoute('homeasignaturaalumno', ['asignaturaalumnoId' => $asignaturaalumno->getId()]);
        }

        return $this->render('AngieNotasBundle:AsignaturaAlumno:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'edit_post'
        ));
    }

     /**
     * @Route("/nuevaasignaturaalumno", name="nuevaasignaturaalumno")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $asignaturaalumno = new AsignaturaAlumno();
        
        $form = $this->createForm(AsignaturaAlumnoForm::class, $asignaturaalumno, array( 'action' => $this->generateUrl('nuevaasignaturaalumno', array() )));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$user = $this->container->get('security.token_storage')->getToken()->getUser();
            //$username = $user->getUsername();
            
            $asignaturaalumno = $form->getData();
            //$asignaturaalumno->setAsignatura($username);
            //$asignaturaalumno->setDate(new \DateTime());
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignaturaalumno);
            $em->flush();

            return $this->redirectToRoute('homeasignaturaalumno', ['asignaturaalumnoId' => $asignaturaalumno->getId()]);
        }

        return $this->render('AngieNotasBundle:AsignaturaAlumno:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'edit_post'
        ));
    }

    /**
     * @Route("/eliminarasignaturaalumno/{asignaturaalumnoId}", name="eliminarasignaturaalumno")
     */
    public function deleteAction($asignaturaalumnoId)
    {
        $em = $this->getDoctrine()->getManager();
        $asignaturaalumno = $em->getRepository('AngieNotasBundle:AsignaturaAlumno')->find($asignaturaalumnoId);

        if (!$asignaturaalumno) {
            throw $this->createNotFoundException(
                'No tipousuario found for id ' . $asignaturaalumnoId
            );
        }
        $em->remove($asignaturaalumno);
        $em->flush();

        return $this->redirectToRoute('homeasignaturaalumno');
    }

}
