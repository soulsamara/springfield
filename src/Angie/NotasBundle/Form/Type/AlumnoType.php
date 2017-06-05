<?php    
namespace Angie\NotasBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlumnoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('priority')
            ->add('alumno', 'entity',
                    array('property' => 'alumno',
                        'class' => 'AngieNotasBundle:Usuario'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Angie\NotasBundle\Entity\Usuario'
        ));
    }

    public function getName()
    {
        return 'angie_notasbundle_alumnotype';
    }
}

?>