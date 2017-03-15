<?php

namespace FrontSupportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarouselType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('cfilename')
//            ->add('cmime')
//            ->add('ccontents')
            ->add('cfilename', 'file', array('data_class' => null,'label' => 'Obraz',  'attr' => array('accept' => 'image/jpeg,image/png')))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontSupportBundle\Entity\Carousel'
        ));
    }
}
