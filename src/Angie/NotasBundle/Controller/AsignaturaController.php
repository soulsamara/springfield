<?php

namespace Angie\NotasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Angie\NotasBundle\Entity\Asignatura;
use Angie\NotasBundle\Form\AsignaturaForm;
use Symfony\Component\HttpFoundation\Request;

class AsignaturaController extends Controller
{
    /**
     * @Route("/asignatura" , name="homeasignatura")
     */
    public function indexAction()
    {
        $asignaturas = $this->getDoctrine()
            ->getRepository('AngieNotasBundle:Asignatura')
            ->findBy(
                array(), 
                array('id'=>'desc')
            );
        return $this->render('AngieNotasBundle:Asignatura:index.html.twig', array(
           'asignaturas' => $asignaturas
        ));
    }

    /**
     * @Route("/editasignatura/{asignaturaId}", name="editasignatura")
     */
    public function editAction($asignaturaId, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $asignatura = $em->getRepository('AngieNotasBundle:Asignatura')->find($asignaturaId);

        if (!$asignatura) {
            throw $this->createNotFoundException(
                'No asignatura found for id ' . $asignaturaId
            );
        }

        $form = $this->createForm(AsignaturaForm::class, $asignatura, array( 'action' => $this->generateUrl('editasignatura', array('asignaturaId' => $asignaturaId) )));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$user = $this->container->get('security.token_storage')->getToken()->getUser();
            //$username = $user->getUsername();
            
            $asignatura = $form->getData();
            //$asignatura->setAsignatura($username);
            //$asignatura->setDate(new \DateTime());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignatura);
            $em->flush();

            return $this->redirectToRoute('homeasignatura', ['asignaturaId' => $asignatura->getId()]);
        }

        return $this->render('AngieNotasBundle:Asignatura:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'edit_post'
        ));
    }

     /**
     * @Route("/nuevaasignatura", name="nuevaasignatura")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $asignatura = new Asignatura();
        
        $form = $this->createForm(AsignaturaForm::class, $asignatura, array( 'action' => $this->generateUrl('nuevaasignatura', array() )));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$user = $this->container->get('security.token_storage')->getToken()->getUser();
            //$username = $user->getUsername();
            
            $asignatura = $form->getData();
            //$asignatura->setAsignatura($username);
            //$asignatura->setDate(new \DateTime());
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($asignatura);
            $em->flush();

            return $this->redirectToRoute('homeasignatura', ['asignaturaId' => $asignatura->getId()]);
        }

        return $this->render('AngieNotasBundle:Asignatura:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'edit_post'
        ));
    }

    /**
     * @Route("/eliminarasignatura/{asignaturaId}", name="eliminarasignatura")
     */
    public function deleteAction($asignaturaId)
    {
        $em = $this->getDoctrine()->getManager();
        $asignatura = $em->getRepository('AngieNotasBundle:Asignatura')->find($asignaturaId);

        if (!$asignatura) {
            throw $this->createNotFoundException(
                'No asignatura found for id ' . $asignaturaId
            );
        }
        $em->remove($asignatura);
        $em->flush();

        return $this->redirectToRoute('homeasignatura');
    }
}
