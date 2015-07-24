<?php

namespace SW\UserBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Nom de la catégorie'))
            ->add('detail', 'text', array('label' => 'Détail'))
;
    }


    public function getName()
    {
        return 'sw_user_category';
    }
}