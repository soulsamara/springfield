<?php
namespace Angie\NotasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
//use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class NotaSemestreAlumnoForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->setMethod('POST')
            ->add('nota1', TextType::class)
            ->add('nota2', TextType::class)
            ->add('nota3', TextType::class)
            ->add('id_asignatura_alumno', TextType::class)
            ->add('semestre', TextType::class)
            //->add('promedio', TextType::class)
            ->add('save', SubmitType::class)
        ;
    }
}
?>