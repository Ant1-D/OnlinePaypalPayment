<?php

namespace Paypal\Bundle\PaypalBundle\Form\Type ;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

/**
 * Class OrderType
 * @package Paypal\Bundle\PaypalBundle\Form\Type
 */
class OrderType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price', HiddenType::class)
            ->add('currency', HiddenType::class)
            ->add('description', HiddenType::class)
            ->add('intent', HiddenType::class)
            ->add('save', SubmitType::class, array('label' => 'Acheter'))
        ;
    }
}