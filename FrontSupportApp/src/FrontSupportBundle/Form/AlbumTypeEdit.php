<?php

namespace FrontSupportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlbumTypeEdit extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        
        $builder
//            ->add('filenamee')
            ->add('filenamee', 'hidden', array('data_class' => null))
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
            'data_class' => 'FrontSupportBundle\Entity\Album'
        ));
    }
}
