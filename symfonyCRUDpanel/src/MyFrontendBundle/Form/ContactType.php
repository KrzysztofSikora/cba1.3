<?php

namespace MyFrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cofilename', 'file', array('data_class' => null,  'attr' => array('accept' => 'image/jpeg,image/png')))
//            ->add('conmime')
//            ->add('cocontents', 'file', array('data_class' => null))
            ->add('condescription')
            ->add('conname')
            ->add('tel')
            ->add('meil')
            ->add('position')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyFrontendBundle\Entity\Contact'
        ));
    }
}
