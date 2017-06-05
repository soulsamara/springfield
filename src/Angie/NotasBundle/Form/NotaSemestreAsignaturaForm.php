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

class NotaSemestreAsignaturaForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->setMethod('GET')
            ->add('asignatura', EntityType::class, array(
                // query choices from this entity
                'class' => 'Angie\NotasBundle\Entity\Asignatura',
                // use the User.username property as the visible option string
                'choice_label' => 'asignatura',
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
            )) 
            //->add('semestre', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }
}
?>