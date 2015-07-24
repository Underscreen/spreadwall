<?php

namespace SW\MarketPlaceBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TaxeFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Nom de la règle'))
            ->add('detail', 'text', array('label' => 'Détail'))
            ->add('taux', 'text', array('label' => 'Taux (en % )'))
;
    }


    public function getName()
    {
        return 'sw_market_place_taxe';
    }
}