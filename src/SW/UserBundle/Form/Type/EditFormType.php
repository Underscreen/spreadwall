<?php

namespace SW\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SW\UserBundle\Entity\Country;

class EditFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', 'text', array('label' => 'Votre nom'))
            ->add('firstname', 'text', array('label' => 'Votre prénom'))
            ->add('email', 'email', array('label' => 'Votre email (identifiant)'))
            ->add('telephone', 'text', array('label' => 'Votre téléphone'))
            ->add('plainPassword', 'password', array('label' => 'Changement de mot de passe','required' => false))
            ->add('birthdate', 'date',array('label' => 'Votre date de naissance','widget' => 'single_text','input' => 'datetime','format' => 'dd/MM/yyyy','attr' => array('class' => 'date form-control'),))
            ->add('username', 'text', array('label' => 'Votre pseudo ou groupe'))
            ->add('address', 'text', array('label' => 'Votre adresse'))
            ->add('postalcode', 'text', array('label' => 'Votre code postal'))
            ->add('city', 'text', array('label' => 'Votre ville'))
            ->add('country', 'entity', array('class'    => 'SWUserBundle:Country','property' => 'nomFrFr','multiple' => false));
    }


    public function getName()
    {
        return 'sw_user_edit_form';
    }
}