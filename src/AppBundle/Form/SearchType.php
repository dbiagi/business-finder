<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type as FormTypes;

class SearchType extends AbstractType {

    const NAME = 'app_bundle_search_type';

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('terms', FormTypes\SearchType::class);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => null,
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix() {
        return self::NAME;
    }
}
