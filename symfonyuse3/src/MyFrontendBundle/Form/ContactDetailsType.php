<?php

namespace MyFrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactDetailsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder

            
//            ->add('fieldType')

            ->add('fieldType', null,  array(

                'label'  => 'Wybierz rodzaj kontaktu', 'required' =>true
            ))
            ->add('contact', null, array(

                'label'  => 'Wybierz osobę','required' =>true
            ))



        ->add('value','hidden', array(
        'data' => 0))

        ->add('isDeleted', 'hidden', array(
            'data' => 0));

//        ->add('task', null, array('max_length' => 4))



    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyFrontendBundle\Entity\ContactDetails'
        ));
    }
}
