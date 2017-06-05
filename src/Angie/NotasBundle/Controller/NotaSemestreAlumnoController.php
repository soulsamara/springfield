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
        $em = $this->getDoctrine()->getManager();
        //$query = $em->getRepository('AngieNotasBundle:NotaSemestreAlumno')->


        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
           //Obtener solo las materias del profesor actual
            $list = $em->createQuery('SELECT a
                     FROM AngieNotasBundle:Asignatura a
                          JOIN AngieNotasBundle:ProfesorAsignatura pa
                          WHERE
                            pa.id_profesor =:user')
                ->setParameter('user', $user->getId())
                ->getResult();
        }
        else {
             //Obtener solo las materias del alumno actual
            $list = $em->createQuery('SELECT a
                     FROM AngieNotasBundle:Asignatura a
                          JOIN AngieNotasBundle:AsignaturaAlumno pa
                          WHERE
                            pa.id_alumno =:user')
                ->setParameter('user', $user->getId())
                ->getResult();

        }
       
        
        return $this->render('AngieNotasBundle:NotaSemestreAlumno:index.html.twig', array(
            'asignaturas' => $list
        ));
    }

    /**
     * @Route("/notasmateria/{id_asignatura}", name="notasmateria")
     */
    public function notesBySubjetAction($id_asignatura)
    {
         $em = $this->getDoctrine()->getManager();
        /*
         $list = $this->getDoctrine()
            ->getRepository('AngieNotasBundle:NotaSemestreAlumno')
            ->findBy(
                array('id_asignatura' => $id_asignatura), 
                array('id'=>'desc')
            );
        */
        //filtro por materia
        $list = $em->createQuery('SELECT nsa
                 FROM AngieNotasBundle:NotaSemestreAlumno nsa
                      JOIN AngieNotasBundle:AsignaturaAlumno aa
                      WHERE
                        aa.id_asignatura =:id_asignatura')
            ->setParameter('id_asignatura', $id_asignatura)
            ->getResult();
    
        return $this->render('AngieNotasBundle:NotaSemestreAlumno:notasmateria.html.twig', array(
            'list' => $list,
            'id_asignatura' => $id_asignatura
        ));
    }

    /**
     * @Route("/editnotasemestrealumno/{notasemestrealumnoId}/{id_asignatura}", name="editnotasemestrealumno")
     */
    public function editAction($notasemestrealumnoId, $id_asignatura, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $notasemestrealumno = $em->getRepository('AngieNotasBundle:NotaSemestreAlumno')->find($notasemestrealumnoId);

        if (!$notasemestrealumno) {
            throw $this->createNotFoundException(
                'No asignatura found for id ' . $notasemestrealumnoId
            );
        }

        $form = $this->createForm(NotaSemestreAlumnoForm::class, $notasemestrealumno, array( 'action' => $this->generateUrl('editnotasemestrealumno', array('notasemestrealumnoId' => $notasemestrealumnoId, 'id_asignatura' => $id_asignatura) )));
        
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
    
    /**
     * @Route("/update-average", name="update-average")
     */
    public function updateAverage()
    {
        $connection =  $this->getDoctrine()->getManager()
            ->getConnection()
            ->getWrappedConnection();

        $stmt = $connection->prepare('CALL actualizar_promedio()');
        //$stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->execute();

        
        return $this->redirectToRoute('notasemestrealumno2');
    }



}
