<?php

namespace SW\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SW\UserBundle\Entity\Activity;

class StyleFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Nom du style'))
            ->add('detail', 'text', array('label' => 'Détail'))
            ->add('activity', 'entity' , array('label' => 'Activité parente', 'class' => 'SWUserBundle:Activity', 'property' => 'name'))
            ->add('parent', 'hidden');
    }


    public function getName()
    {
        return 'sw_user_style';
    }
}