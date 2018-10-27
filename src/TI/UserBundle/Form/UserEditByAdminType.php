<?php

namespace TI\UserBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserEditByAdminType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('current_password')
            ->add('location', TextType::class)
            ->add('weightCategories', EntityType::class, array(
                'class' => 'TIPlatformBundle:WeightCategory',
                'choice_label' => 'name',
                'multiple' => true,
            ))
            //->add('Modifier', SubmitType::class)
        ;

    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TI\UserBundle\Entity\User'
        ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ti_userbundle_user';
    }


}
