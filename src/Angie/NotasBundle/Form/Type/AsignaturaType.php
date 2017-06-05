<?php    
namespace Angie\NotasBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AsignaturaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('priority')
            ->add('asignatura', 'entity',
                    array('property' => 'asignatura',
                        'class' => 'AngieNotasBundle:Asignatura'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Angie\NotasBundle\Entity\Asignatura'
        ));
    }

    public function getName()
    {
        return 'angie_notasbundle_asignaturatype';
    }
}

?>