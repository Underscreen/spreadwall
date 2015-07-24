<?php

namespace SW\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SW\UserBundle\Entity\Category;
use SW\UserBundle\Entity\Activity;

class ArtistFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categories', 'entity' , array('label' => 'Catégorie parente', 'class' => 'SWUserBundle:Category', 'property' => 'name'))
            ->add('activities', 'entity' , array('label' => 'Catégorie parente', 'class' => 'SWUserBundle:Activity', 'property' => 'name', 'data' => 'empty'));
    }


    public function getName()
    {
        return 'sw_user_category';
    }
}