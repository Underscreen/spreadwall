<?php

namespace SW\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SW\UserBundle\Entity\Country;

class RegistrationFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', 'choice', array('label' => 'Civilité',
                'choices' => array( 1 => 'Homme ', 2 => 'Femme '),
                'expanded' =>true,
                'required' => true
            ))
            ->add('lastname', 'text', array('label' => 'Votre nom'))
            ->add('firstname', 'text', array('label' => 'Votre prénom'))
            ->add('email', 'email', array('label' => 'Votre email (identifiant)'))
            ->add('telephone', 'text', array('label' => 'Votre téléphone'))
            ->add('plainPassword', 'password', array('label' => 'Mot de passe'))
            ->add('birthdate', 'date',array('label' => 'Votre date de naissance','widget' => 'single_text','input' => 'datetime','format' => 'dd/MM/yyyy','attr' => array('class' => 'date form-control'),))
            ->add('username', 'text', array('label' => 'Votre pseudo ou groupe'))
            ->add('address', 'text', array('label' => 'Votre adresse'))
            ->add('postalcode', 'text', array('label' => 'Votre code postal'))
            ->add('city', 'text', array('label' => 'Votre ville'))
            ->add('country', 'entity', array('class'    => 'SWUserBundle:Country','property' => 'nomFrFr','multiple' => false))
            ->add('cgv', 'checkbox', array('label'=>'Acceptez vous les CGV ?'))
;
    }


    public function getName()
    {
        return 'sw_user_registration';
    }
}