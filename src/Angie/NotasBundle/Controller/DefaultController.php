<?php

namespace Angie\NotasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{ 
	 /**
     * @Route("/" , name="homepage")
     */
    public function indexAction()
    {
    	$menu = array(
    		array("Title"=> 'Asignatura', "Url" =>'asignatura'),
    		array("Title"=> 'TipoUsuario', "Url" =>'tipo_usuario'),
    		array("Title"=> 'NotaSemestreAlumno', "Url" =>'notasemestrealumno2'),
    		array("Title"=> 'AsignaturaAlumno', "Url" =>'homeasignaturaalumno'),
    		array("Title"=> 'ProfesorAsignatura', "Url" =>'homeprofesorasignatura'),
    		array("Title"=> 'Usuario', "Url" =>'usuario'),
            array("Title"=> 'Historial', "Url" =>'homehistorial'),
    	);
        return $this->render('AngieNotasBundle:Default:index.html.twig',
        array('menu' => $menu)
        );
    }
}
