<?php

namespace SW\SliderBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SW\SliderBundle\Entity\Slider;
use SW\SliderBundle\Form\Type\SlideFormType;

class SliderFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Nom'))
            ->add('largeur', 'text', array('label' => 'Largeur (px)'))
            ->add('hauteur', 'text', array('label' => 'Hauteur (px)'))
            ->add('slides', 'collection', array('type' => new SlideFormType(),'allow_add' => true,'by_reference' => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SW\SliderBundle\Entity\Slider',
        ));
    }


    public function getName()
    {
        return 'sw_slider_form';
    }
}