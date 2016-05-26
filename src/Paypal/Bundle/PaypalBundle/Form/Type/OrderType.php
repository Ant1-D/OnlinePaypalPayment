<?php

namespace Paypal\Bundle\PaypalBundle\Form\Type ;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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
            ->add('price', TextType::class)
            ->add('currency', ChoiceType::class, array(
                'choices' => array(
                    'Euro' => 'EUR',
                    'Dollar' => 'USD'
                ),
                'required'    => true,
                'placeholder' => 'Choose your currency',
                'empty_data'  => null
            ))
            ->add('description', TextType::class)
            ->add('intent', ChoiceType::class, array(
                'choices' => array(
                    'Sale' => 'sale',
                    'Order' => 'order'
                ),
                'required'    => true,
                'placeholder' => 'Choose your intent',
                'empty_data'  => null
            ))
            ->add('save', SubmitType::class, array('label' => 'Create Order'))
        ;
    }
}