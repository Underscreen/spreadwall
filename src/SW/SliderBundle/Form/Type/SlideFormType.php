<?php

namespace SW\SliderBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SW\SliderBundle\Entity\Slide;
use SW\SliderBundle\Entity\Transition;
use SW\SliderBundle\Form\Type\ElementFormType;

class SlideFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Nom'))
            ->add('delai', 'text', array('label' => 'Délai (ms)'))
            ->add('transition', 'entity', array('class'    => 'SWSliderBundle:Transition','property' => 'name','multiple' => false))
            ->add('imageFile', 'vich_image', array('required'  => false,'allow_delete'  => true,'download_link' => true,'label' => 'Image du slide (900x480 recommandé)'))
            ->add('elements', 'collection', array('type' => new ElementFormType(),'allow_add' => true,'by_reference' => false));;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SW\SliderBundle\Entity\Slide',
        ));
    }

    public function getName()
    {
        return 'sw_slide_form';
    }
}