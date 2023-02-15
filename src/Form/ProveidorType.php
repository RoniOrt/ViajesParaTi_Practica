<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProveidorType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
        ->add('nom', TextType::class, array(
            'label' => 'Nombre del Proveedor'
        ))
        ->add('email', EmailType::class, array(
            'label' => 'Email'
        ))
        ->add('telefon', TextType::class, array(
            'label' => 'Teléfono'
        ))
        ->add('tipus', ChoiceType::class, array(
            'label' => 'Tipo',
            'choices' => array(
                'Hotel' => 'Hotel',
                'Pista' => 'Pista',
                'Complemento' => 'Complemento'
            )
        ))
        ->add('estat', ChoiceType::class, array(
            'label' => 'Estado',
            'choices' => array(
                'Activo' => '1',
                'Inactivo' => '0'
            )
        ))
        ->add('submit', SubmitType::class, array(
            'label' => 'Guardar',

        ));
    }
}