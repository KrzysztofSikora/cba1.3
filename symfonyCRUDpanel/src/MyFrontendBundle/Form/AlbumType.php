<?php

namespace MyFrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlbumType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        
        $builder
//            ->add('filenamee')
            ->add('filenamee', 'file', array('data_class' => null,'label' => 'Obraz',  'attr' => array('accept' => 'image/jpeg,image/png' )))
//            ->add('mimee')
//            ->add('contentss')
            ->add('descriptionn', null, array('label' => 'Opis'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyFrontendBundle\Entity\Album'
        ));
    }
}
