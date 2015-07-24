<?php

namespace SW\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SW\UserBundle\Entity\Category;

class ActivityFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Nom de l\'activité'))
            ->add('detail', 'text', array('label' => 'Détail'))
            ->add('category', 'entity' , array('label' => 'Catégorie parente', 'class' => 'SWUserBundle:Category', 'property' => 'name'))
            ->add('parent', 'hidden');
    }


    public function getName()
    {
        return 'sw_user_activity';
    }
}