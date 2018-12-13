<?php

namespace AppBundle\Form;

use AppBundle\Entity\OffreEmploie;
use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class CandidatureType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('qualification')
            ->add('motivation')
          //  ->add('etatCandidature'(array
            ->add('etatCandidature', ChoiceType::class, array(
        'choices' => array(
            '1' => true)))
            ->add('offre_candidature', EntityType::class, array(

                'class' => OffreEmploie::class,
                'choice_label' => 'description',
                'attr' => array(
                    'class' => 'select2'
                )
            ))
            ->add('utilisateur_candidat', EntityType::class, array(

                'class' => User::class,
                'choice_label' => 'nom',
                'attr' => array(
                    'class' => 'select2'
                )
            ))
            ->add('save',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Candidature'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_candidature';
    }


}
