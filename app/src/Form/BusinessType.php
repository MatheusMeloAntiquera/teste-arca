<?php

namespace App\Form;

use App\Entity\Business;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BusinessType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('phone')
            ->add('address')
            ->add('zipcode')
            ->add('state', ChoiceType::class, [
                'choices' => [
                    'São Paulo' => 'São Paulo',
                ],
            ])
            ->add('city', ChoiceType::class, [
                'choices' => [
                    'Bauru' => 'Bauru',
                    'Agudos' => 'Agudos',
                    'Jaú' => 'Jaú',
                ],
            ])
            ->add('description')
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Auto' => 'Auto',
                    'Beauty and Fitness' => 'Beauty and Fitness',
                    'Entertainment' => 'Entertainment',
                    'Food and Dining' => 'Food and Dining',
                    'Health' => 'Health',
                    'Sports' => 'Sports',
                    'Travel' => 'Travel'
                ],
                "multiple" => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Business::class,
        ]);
    }
}
