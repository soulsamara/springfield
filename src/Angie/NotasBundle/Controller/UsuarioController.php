<?php

namespace Angie\NotasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UsuarioController extends Controller
{
    /**
     * @Route("/usuario")
     */
    public function indexAction()
    {
         $list = $this->getDoctrine()
            ->getRepository('AngieNotasBundle:Usuario')
            ->findBy(
                array(), 
                array('id'=>'desc')
            );
    
        return $this->render('AngieNotasBundle:Usuario:index.html.twig', array(
            'list' => $list
        ));
    }

}
