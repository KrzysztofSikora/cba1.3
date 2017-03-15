<?php

namespace FrontSupportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SquadType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('filenameee', 'file', array('data_class' => null,'label' => 'Obraz',  'attr' => array('accept' => 'image/jpeg,image/png')))
//            ->add('mimeee')
//            ->add('contentsss')
            ->add('descriptionnn', null, array('label' => 'Opis'))
            ->add('name', null, array('label' => 'Imie i nazwisko'))
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
