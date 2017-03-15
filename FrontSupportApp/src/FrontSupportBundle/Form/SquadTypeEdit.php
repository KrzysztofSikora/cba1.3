<?php

namespace FrontSupportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SquadTypeEdit extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filenameee', 'hidden', array('data_class' => null))
//            ->add('mimeee')
//            ->add('contentsss')
            ->add('descriptionnn', null, array('label' => 'Opis'))
            ->add('name', null, array('label' => 'Imię i nazwisko'))
            ->add('info', null, array('label' => 'Info'))
            ->add('position', null, array('label' => 'Pozycja'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FrontSupportBundle\Entity\Squad'
        ));
    }
}
