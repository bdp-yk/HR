<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('nom')
            ->add('prenom')
            ->add('passeport')
            ->add('cin')
            ->add('ribBancaire')
            ->add('dateNaissance')
            ->add('dateEmploie')
            ->add('adresseMail')
            ->add('adresseVille')
            ->add('numeroTelephone')
            ->add('etatCivil')
            ->add('etatFamilial')
            ->add('login')
            ->add('password')
            ->add('departement_associe')
            ->add('evennements_adheres')
            ->add('photo_profil')
           ->add('role')
      ->add('save',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Utilisateur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_utilisateur';
    }


}
