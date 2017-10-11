<?php

namespace BusinessFinder\ListingBundle\Form;

use BusinessFinder\AppBundle\Entity\Listing;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListingType extends AbstractType
{

    const NAME = 'business_type';

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => 'Título',
            ])
            ->add('phone', null, [
                'label' => 'Fone',
            ])
            ->add('address', null, [
                'label' => 'Endereço',
            ])
            ->add('zipCode', null, [
                'label' => 'CEP',
            ])
            ->add('city', null, [
                'label' => 'Cidade',
            ])
            ->add('state', null, [
                'label' => 'Uf',
            ])
            ->add('categories', null, [
                'label'        => 'Categorias',
                'choice_label' => 'name',
            ])
            ->add('description', null, [
                'label' => 'Descrição',
                'attr'  => [
                    'class' => 'materialize-textarea',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Listing::class,
        ]);
    }

    public function getBlockPrefix()
    {
        return self::NAME;
    }
}
