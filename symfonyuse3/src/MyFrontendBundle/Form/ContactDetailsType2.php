<?php

namespace MyFrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactDetailsType2 extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $entity = $builder->getData();
        $v = $entity->getFieldType()->getFieldType();
        if ($v == 'mobile') {

            $builder
                ->add('fieldType', null, array(

                    'label' => 'Rodzaj kontaktu:',
                    'disabled' => 'disabled'
                ))
                ->add('contact', null, array(

                    'label' => 'Wybrana soba:',
                    'disabled' => 'disabled'
                ))
                ->add('value', TextType::class, array('label' => 'Numer mobile:', 'pattern' => '[0-9]+[-][0-9]+[-][0-9]+', 'attr' => array('placeholder' => 'np.: ____-____-___')))
                ->add('isDeleted', 'hidden', array(
                    'data' => 0));
        }

        if ($v == 'note') {

            $builder
                ->add('fieldType', null, array(

                    'label' => 'Rodzaj kontaktu:',
                    'disabled' => 'disabled'
                ))
                ->add('contact', null, array(

                    'label' => 'Wybrana osoba:',
                    'disabled' => 'disabled'
                ))
                ->add('value', TextType::class, array('label' => 'Notatka:'))
                ->add('isDeleted', 'hidden', array(
                    'data' => ''));
        }

        if ($v == 'homepage_uri') {

            $builder
                ->add('fieldType', null, array(

                    'label' => 'Rodzaj kontaktu:',
                    'disabled' => 'disabled'
                ))
                ->add('contact', null, array(

                    'label' => 'Wybrana osoba:',
                    'disabled' => 'disabled'
                ))
                ->add('value', UrlType::class, array('label' => 'Adres Url:'))
                ->add('isDeleted', 'hidden', array(
                    'data' => 0));
        }
        if ($v == 'email') {

            $builder
//            ->add('fieldType')

                ->add('fieldType', null, array(

                    'label' => 'Rodzaj kontaktu:',
                    'disabled' => 'disabled'
                ))
                ->add('contact', null, array(

                    'label' => 'Wybrana osoba:',
                    'disabled' => 'disabled'
                ))
                ->add('value', EmailType::class, array('label' => 'Email:'))
                ->add('isDeleted', 'hidden', array(
                    'data' => 0));
        }

        if ($v == 'phone') {

            $builder
//            ->add('fieldType')

                ->add('fieldType', null, array(

                    'label' => 'Rodzaj kontaktu:',
                    'disabled' => 'disabled'
                ))
                ->add('contact', null, array(

                    'label' => 'Wybrana osoba:',
                    'disabled' => 'disabled'
                ))
                ->add('value', TextType::class, array('label' => 'Numer mobile:', 'pattern' => '[0-9]+[-][0-9]+[-][0-9]+', 'attr' => array('placeholder' => 'np.: ____-____-___')))
                ->add('isDeleted', 'hidden', array(
                    'data' => 0));
        }

//        'attr' => array('placeholder' => '__________'))

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
