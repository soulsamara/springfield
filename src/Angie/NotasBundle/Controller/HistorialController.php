<?php

namespace Angie\NotasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HistorialController extends Controller
{
     /**
     * @Route("/homehistorial", name="homehistorial")
     */
    public function indexAction()
    {
         $list = $this->getDoctrine()
            ->getRepository('AngieNotasBundle:Historial')
            ->findBy(
                array(), 
                array('id'=>'desc')
            );
    
        return $this->render('AngieNotasBundle:Historial:index.html.twig', array(
            'list' => $list
        ));
    } 

     /**
     * @Route("/eliminarhistorial/{historialId}", name="eliminarhistorial")
     */
    public function deleteAction($historialId)
    {
        $em = $this->getDoctrine()->getManager();
        $historial = $em->getRepository('AngieNotasBundle:Historial')->find($historialId);

        if (!$historial) {
            throw $this->createNotFoundException(
                'No tipousuario found for id ' . $historialId
            );
        }
        $em->remove($historial);
        $em->flush();

        return $this->redirectToRoute('homehistorial');
    }   

}
