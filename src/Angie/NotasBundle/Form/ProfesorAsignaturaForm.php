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

class ProfesorAsignaturaForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->setMethod('POST')
            ->add('asignatura', EntityType::class, array(
			    // query choices from this entity
			    'class' => 'Angie\NotasBundle\Entity\Asignatura',
			    // use the User.username property as the visible option string
			    'choice_label' => 'asignatura',
			    // used to render a select box, check boxes or radios
			    // 'multiple' => true,
			    // 'expanded' => true,
			)) 
            ->add('profesor', EntityType::class, array(
                // profesor choices from this entity
                'class' => 'Angie\NotasBundle\Entity\Usuario',
                // use the User.username property as the visible option string
                'choice_label' => 'username',
                /*
                'query_builder' => function(UserRepository $repository) {
                    $qb = $repository->createQueryBuilder('u');
                    // the function returns a QueryBuilder object
                    return $qb
                        // find all users where 'deleted' is NOT '1'
                        >where($qb->expr()->orX(
                            $qb->expr()->like('u.roles', ':roles')
                        ))
                        ->setParameter('roles', '%"'. 'ROLE_ADMIN' .'"%');
                     
                },
                */
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            )) 
            ->add('save', SubmitType::class)
        ;
    }
}
?>