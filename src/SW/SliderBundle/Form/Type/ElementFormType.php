<?php

namespace SW\SliderBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use SW\SliderBundle\Entity\Element;
use SW\SliderBundle\Entity\Transition;

class ElementFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('genre', 'choice', array('choices' => array('h1'=>'Titre 1','h2'=>'Titre 2','h3'=>'Titre 3','h4'=>'Titre 4','h5'=>'Titre 5','h6'=>'Titre 6','p'=>'Paragraphe','a'=>'Lien (bouton)','img'=>'Image')))
            ->add('content', 'text', array('label' => 'Contenu','required'=>false))
            ->add('link', 'text', array('label' => 'Lien','required'=>false))
            ->add('positionTop', 'text', array('label' => 'Top','required'=>false))    
            ->add('positionLeft', 'text', array('label' => 'Left','required'=>false))    
            ->add('background', 'text', array('label' => 'Couleur de fond','required'=>false))    
            ->add('color', 'text', array('label' => 'Couleur du texte')) 
            ->add('inoffsetx', 'text', array('label' => 'Offset X (0 - 1)','required'=>false))    
            ->add('inoffsety', 'text', array('label' => 'Offset Y (0 - 1)'))        
            ->add('induration', 'text', array('label' => 'Durée (ms)','required'=>false))        
            ->add('indelay', 'text', array('label' => 'Délai (ms)','required'=>false))        
            ->add('inrotate', 'text', array('label' => 'Rotaton (Degrés)','required'=>false))  
            ->add('inscalex', 'text', array('label' => 'Scale X (0 - 1)','required'=>false))    
            ->add('inscaley', 'text', array('label' => 'Scale Y (0 - 1)','required'=>false))  
            ->add('outoffsetx', 'text', array('label' => 'Offset X (0 - 1)','required'=>false))    
            ->add('outoffsety', 'text', array('label' => 'Offset Y (0 - 1)','required'=>false))        
            ->add('outduration', 'text', array('label' => 'Durée (ms)','required'=>false))        
            ->add('outdelay', 'text', array('label' => 'Délai (ms)','required'=>false))        
            ->add('outrotate', 'text', array('label' => 'Rotaton (Degrés)','required'=>false))  
            ->add('outscalex', 'text', array('label' => 'Scale X (0 - 1)','required'=>false))    
            ->add('outscaley', 'text', array('label' => 'Scale Y (0 - 1)','required'=>false))  
            ->add('parallax', 'text', array('label' => 'Effet parallax (-10 à 10)','required'=>false))    
            ->add('slide', 'entity', array('class'    => 'SWSliderBundle:Slide','property' => 'id','multiple' => false))    
            ->add('imageFile', 'vich_image', array('required'  => false,'allow_delete'  => true,'download_link' => true,'label' => 'Image du layer'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SW\SliderBundle\Entity\Element',
        ));
    }

    public function getName()
    {
        return 'sw_slide_form';
    }
}