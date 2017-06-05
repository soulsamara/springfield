<?php

namespace Angie\NotasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Angie\NotasBundle\Entity\ProfesorAsignatura;
use Angie\NotasBundle\Form\ProfesorAsignaturaForm;
use Symfony\Component\HttpFoundation\Request;


class ProfesorAsignaturaController extends Controller
{
    /**
     * @Route("/homeprofesorasignatura", name="homeprofesorasignatura")
     */
    public function indexAction()
    {
         $list = $this->getDoctrine()
            ->getRepository('AngieNotasBundle:ProfesorAsignatura')
            ->findBy(
                array(), 
                array('id'=>'desc')
            );
    
        return $this->render('AngieNotasBundle:ProfesorAsignatura:index.html.twig', array(
            'list' => $list
        ));
    }

     /**
     * @Route("/editprofesorasignatura/{profesorasignaturaId}", name="editprofesorasignatura")
     */
    public function editAction($profesorasignaturaId, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $profesorasignatura = $em->getRepository('AngieNotasBundle:ProfesorAsignatura')->find($profesorasignaturaId);

        if (!$profesorasignatura) {
            throw $this->createNotFoundException(
                'No tipousuario found for id ' . $profesorasignaturaId
            );
        }

        $form = $this->createForm(ProfesorAsignaturaForm::class, $profesorasignatura, array( 'action' => $this->generateUrl('editprofesorasignatura', array('profesorasignaturaId' => $profesorasignaturaId) )));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$user = $this->container->get('security.token_storage')->getToken()->getUser();
            //$username = $user->getUsername();
            
            $profesorasignatura = $form->getData();
            //$asignaturaalumno->setAsignatura($username);
            //$asignaturaalumno->setDate(new \DateTime());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($profesorasignatura);
            $em->flush();

            return $this->redirectToRoute('homeprofesorasignatura', ['profesorasignaturaId' => $profesorasignatura->getId()]);
        }

        return $this->render('AngieNotasBundle:ProfesorAsignatura:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'edit_post'
        ));
    }

     /**
     * @Route("/nuevoprofesorasignatura", name="nuevoprofesorasignatura")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $profesorasignatura = new ProfesorAsignatura();
        
        $form = $this->createForm(ProfesorAsignaturaForm::class, $profesorasignatura, array( 'action' => $this->generateUrl('nuevoprofesorasignatura', array() )));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$user = $this->container->get('security.token_storage')->getToken()->getUser();
            //$username = $user->getUsername();
            
            $profesorasignatura = $form->getData();
            //$asignaturaalumno->setAsignatura($username);
            //$asignaturaalumno->setDate(new \DateTime());
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($profesorasignatura);
            $em->flush();

            return $this->redirectToRoute('homeprofesorasignatura', ['profesorasignaturaId' => $profesorasignatura->getId()]);
        }

        return $this->render('AngieNotasBundle:ProfesorAsignatura:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'edit_post'
        ));
    }

    /**
     * @Route("/eliminarprofesorasignatura/{profesorasignaturaId}", name="eliminarprofesorasignatura")
     */
    public function deleteAction($profesorasignaturaId)
    {
        $em = $this->getDoctrine()->getManager();
        $profesorasignatura = $em->getRepository('AngieNotasBundle:ProfesorAsignatura')->find($profesorasignaturaId);

        if (!$profesorasignatura) {
            throw $this->createNotFoundException(
                'No tipousuario found for id ' . $profesorasignaturaId
            );
        }
        $em->remove($profesorasignatura);
        $em->flush();

        return $this->redirectToRoute('homeprofesorasignatura');
    }


}
