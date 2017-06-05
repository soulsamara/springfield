<?php
namespace Angie\NotasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class NotaSemestreAlumnoForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$id_asignatura = $options['id_asignatura'];
        $builder
			->setMethod('POST')
            ->add('nota1', TextType::class)
            ->add('nota2', TextType::class)
            ->add('nota3', TextType::class)
            //->add('asignatura_alumno', TextType::class)
            ->add('asignatura_alumno', EntityType::class, array(
                // profesor choices from this entity
                'class' => 'Angie\NotasBundle\Entity\AsignaturaAlumno',
                'choice_label' => 'alumno.username',
                
                //'class' => 'Angie\NotasBundle\Entity\ViewAsignaturaAlumno',
                // use the User.username property as the visible option string
                //'choice_label' => 'alumno',
                /*
                'query_builder_' => function(UserRepository $repository) {
                    $qb = $repository->createQueryBuilder('u');
                    // the function returns a QueryBuilder object
                    return $qb
                        // find all users where 'deleted' is NOT '1'
                        ->where('u.id_asignatura = :id_asignatura')->setParameter('id_asignatura', $id_asignatura);
                     
                },
                */
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            )) 
            ->add('semestre', TextType::class)
            //->add('promedio', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }
}
?>