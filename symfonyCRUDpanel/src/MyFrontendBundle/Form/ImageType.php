<?php

namespace MyFrontendBundle\Form;

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
        $entity = $builder->getData();
//        $v = $entity->getFieldType()->getFieldType();
        $v = $entity->getContents();
//        print_r($v);
        $builder
//            ->add('filename')
//            ->add('mime')
//            ->add('contents')
            ->add('filename', 'file', array('data_class' => null,'label' => 'Obraz',  'attr' => array('accept' => 'image/jpeg,image/png')))
//            ->add('filename', 'hidden', array('data_class' => null))
//            ->add('album')
            ->add('description', null, array('label' => 'Opis'))
            ->add('status', 'hidden', array('label' => 'Karuzela','data' => 0))
            ->add('album', null, array('required' => true))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyFrontendBundle\Entity\Image'
        ));
    }
}
