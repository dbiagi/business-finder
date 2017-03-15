<?php

namespace AppBundle\Form;

use AppBundle\Entity\Business;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as FormTypes;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BusinessType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('title')
            ->add('phone')
            ->add('address')
            ->add('zipCode')
            ->add('city')
            ->add('state')
            ->add('categories', null, [
                'choice_label' => 'name',
                'expanded'     => true,
            ])
            ->add('description');
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Business::class,
        ]);
    }

    public function getBlockPrefix() {
        return 'app_bundle_business_type';
    }
}
