<?php

namespace App\Form;

use App\Entity\Bien;
use App\Entity\Lieu;
use App\Entity\Type;
use App\Entity\Famille;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isExclusif')
            ->add('titre')
            ->add('lieu', EntityType::class, [
                'class' => Lieu::class,
                'choice_label' => 'label'
            ])
            ->add('piece')
            ->add('surface')
            ->add('prix')
            ->add('description')
            ->add('isVisible')
           // ->add('reference')
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'label'
            ])
            ->add('famille', EntityType::class, [
                'class' => Famille::class,
                'choice_label' => 'label'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
