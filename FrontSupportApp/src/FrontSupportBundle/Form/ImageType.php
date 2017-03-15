<?php

namespace FrontSupportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filename', 'file', array('data_class' => null,'label' => 'Obraz',  'attr' => array('accept' => 'image/jpeg,image/png')))
            ->add('description', null, array('label' => 'Opis'))
            ->add('album', null, array('required' => true))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontSupportBundle\Entity\Image'
        ));
    }
}
