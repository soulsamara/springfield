<?php

namespace Angie\NotasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Angie\NotasBundle\Entity\TipoUsuario;
use Angie\NotasBundle\Form\TipoUsuarioForm;
use Symfony\Component\HttpFoundation\Request;

class TipoUsuarioController extends Controller
{
    /**
     * @Route("/tipo_usuario", name="hometipousuario")
     */
    public function indexAction()
    {
         $list = $this->getDoctrine()
            ->getRepository('AngieNotasBundle:TipoUsuario')
            ->findBy(
                array(), 
                array('id'=>'desc')
            );
    
        return $this->render('AngieNotasBundle:TipoUsuario:index.html.twig', array(
            'list' => $list
        ));
    }

    /**
     * @Route("/edittipousuario/{tipousuarioId}", name="edittipousuario")
     */
    public function editAction($tipousuarioId, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tipousuario = $em->getRepository('AngieNotasBundle:TipoUsuario')->find($tipousuarioId);

        if (!$tipousuario) {
            throw $this->createNotFoundException(
                'No tipousuario found for id ' . $tipousuarioId
            );
        }

        $form = $this->createForm(TipoUsuarioForm::class, $tipousuario, array( 'action' => $this->generateUrl('edittipousuario', array('tipousuarioId' => $tipousuarioId) )));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$user = $this->container->get('security.token_storage')->getToken()->getUser();
            //$username = $user->getUsername();
            
            $tipousuario = $form->getData();
            //$tipousuario->setAsignatura($username);
            //$tipousuario->setDate(new \DateTime());
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipousuario);
            $em->flush();

            return $this->redirectToRoute('hometipousuario', ['tipousuarioId' => $tipousuario->getId()]);
        }

        return $this->render('AngieNotasBundle:TipoUsuario:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'edit_post'
        ));
    }

     /**
     * @Route("/nuevotipousuario", name="nuevotipousuario")
     */
    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $tipousuario = new TipoUsuario();
        
        $form = $this->createForm(TipoUsuarioForm::class, $tipousuario, array( 'action' => $this->generateUrl('nuevotipousuario', array() )));
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //$user = $this->container->get('security.token_storage')->getToken()->getUser();
            //$username = $user->getUsername();
            
            $tipousuario = $form->getData();
            //$tipousuario->setAsignatura($username);
            //$tipousuario->setDate(new \DateTime());
            
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($tipousuario);
            $em->flush();

            return $this->redirectToRoute('hometipousuario', ['tipousuarioId' => $tipousuario->getId()]);
        }

        return $this->render('AngieNotasBundle:TipoUsuario:edit_post.html.twig', array(
           'form' => $form->createView()
           ,'title' => 'edit_post'
        ));
    }

    /**
     * @Route("/eliminartipousuario/{tipousuarioId}", name="eliminartipousuario")
     */
    public function deleteAction($tipousuarioId)
    {
        $em = $this->getDoctrine()->getManager();
        $tipousuario = $em->getRepository('AngieNotasBundle:TipoUsuario')->find($tipousuarioId);

        if (!$tipousuario) {
            throw $this->createNotFoundException(
                'No tipousuario found for id ' . $tipousuarioId
            );
        }
        $em->remove($tipousuario);
        $em->flush();

        return $this->redirectToRoute('hometipousuario');
    }

}
