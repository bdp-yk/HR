<?php

namespace AppBundle\Form;

use AppBundle\Entity\Departement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle', 'attr' => array(
                'class' => 'form-control'
            )))
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle', 'attr' => array(
                'class' => 'form-control'
            )))
            ->add('nom', TextType::class, array('attr' => array(
                'class' => 'form-control'
            )))
            ->add('prenom', TextType::class, array('attr' => array(
                'class' => 'form-control'
            )))
            ->add('passeport', TextType::class, array('attr' => array(
                'class' => 'form-control'
            )))
            ->add('cin', TextType::class, array('attr' => array(
                'class' => 'form-control'
            )))
            ->add('ribBancaire', TextType::class, array('attr' => array(
                'class' => 'form-control'
            )))
            ->add('dateNaissance', TextType::class, array('attr' => array(
                'class' => 'form-control datepicker'
            )))
            ->add('dateEmploie', TextType::class, array('attr' => array(
                'class' => 'form-control datepicker'
            )))
            ->add('adresseVille', TextType::class, array('attr' => array(
                'class' => 'form-control'
            )))
            ->add('numeroTelephone', TextType::class, array('attr' => array(
                'class' => 'form-control'
            )))
            ->add('etatCivil', TextType::class, array('attr' => array(
                'class' => 'form-control'
            )))
            ->add('etatFamilial', TextType::class, array('attr' => array(
                'class' => 'form-control'
            )))
            ->add('departement_associe', EntityType::class, array(

                'class' => Departement::class,
                'choice_label' => 'designation',
                'attr' => array(
                    'class' => 'select2 form-control py-2'
                )
            ))
            ->add('Submit',SubmitType::class);

    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
