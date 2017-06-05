<?php

namespace Angie\NotasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Angie\NotasBundle\Entity\NotaSemestreAlumno;
use Angie\NotasBundle\Form\NotaSemestreAlumnoForm;
use Symfony\Component\HttpFoundation\Request;

class NotaSemestreAlumnoController extends Controller
{
    /**
     * @Route("/notasemestrealumno2", name="notasemestrealumno2")
     */
    public function indexAction()
    {
         $list = $this->getDoctrine()
            ->getRepository('AngieNotasBundle:NotaSemestreAlumno')
            ->findBy(
                array(), 
                array('id'=>'desc')
            );
    
        return $this->render('AngieNotasBundle:NotaSemestreAlumno:index.html.twig', array(
            'list' => $list
        ));
    }

    /**
     * @Route("/editnotasemestrealumno/{notasemestrealumnoId}", name="notasemestrealumno")
     */
    public function editAction($notasemestrealumnoId, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $notasemestrealumno = $em->getRepository('AngieNotasBundle:NotaSemestreAlumno')->find($notasemestrealumnoId);

        if (!$notasemestrealumno) {
            throw $this->createNotFoundException(
                'No asignatura found for id ' . $notasemestrealumnoId
            );
        }

        $form = $this->createForm(NotaSemestreAlumnoForm::class, $notasemestrealumno, array( 'action' => $this->generateUrl('notasemestrealumno', array('notasemestrealumnoId' => $notasemestrealumnoId) )));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$user = $this->container->get('security.token_storage')->getToken()->getUser();
            //$username = $user->getUsername();
            
            $notasemestrealumno = $form->getData();
            //$asignatura->setAsignatura($username);
            //$asignatura->setDate(new \DateTime());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($notasemestrealumno);
            $em->flush();

            return $this->redirectToRoute('notasemestrealumno2', ['notasemestrealumnoId' => $notasemestrealumno->getId()]);
        }

        return $this->render('AngieNotasBundle:NotaSemestreAlumno:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'edit_post'
        ));
    }

     /**
     * @Route("/nuevonotasemestrealumno", name="nuevonotasemestrealumno")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $notasemestrealumno = new NotaSemestreAlumno();
        
        $form = $this->createForm(NotaSemestreAlumnoForm::class, $notasemestrealumno, array( 'action' => $this->generateUrl('nuevonotasemestrealumno', array() )));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$user = $this->container->get('security.token_storage')->getToken()->getUser();
            //$username = $user->getUsername();
            
            $notasemestrealumno = $form->getData();
            //$asignatura->setAsignatura($username);
            //$asignatura->setDate(new \DateTime());
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($notasemestrealumno);
            $em->flush();

            return $this->redirectToRoute('notasemestrealumno2', ['notasemestrealumnoId' => $notasemestrealumno->getId()]);
        }

        return $this->render('AngieNotasBundle:NotaSemestreAlumno:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'edit_post'
        ));
    }

    /**
     * @Route("/eliminarnotasemestrealumno/{notasemestrealumnoId}", name="eliminarnotasemestrealumno")
     */
    public function deleteAction($notasemestrealumnoId)
    {
        $em = $this->getDoctrine()->getManager();
        $notasemestrealumno = $em->getRepository('AngieNotasBundle:NotaSemestreAlumno')->find($notasemestrealumnoId);

        if (!$notasemestrealumno) {
            throw $this->createNotFoundException(
                'No asignatura found for id ' . $notasemestrealumnoId
            );
        }
        $em->remove($notasemestrealumno);
        $em->flush();

        return $this->redirectToRoute('notasemestrealumno2');
    }
}
