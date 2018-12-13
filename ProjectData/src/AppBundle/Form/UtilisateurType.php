<?php

namespace AppBundle\Form;

use AppBundle\Entity\Departement;
use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;




class UtilisateurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('nom',TextType::class)
          ->add('prenom',TextType::class)
          ->add('passeport',TextType::class)
           ->add('cin',TextType::class)
            ->add('ribBancaire',TextType::class)
            ->add('dateNaissance')
            ->add('dateEmploie')
            ->add('adresseMail')
            ->add('adresseVille')
            ->add('numeroTelephone')
            ->add('etatCivil')
            ->add('etatFamilial')
            ->add('login',TextType::class)
            ->add('password')
            ->add('departement_associe',EntityType::class, array(

                'class' => Departement::class,
                'choice_label' => 'designation',
                'attr' => array(
                    'class' => 'select2'
                )
            ))


            ->add('photo_profil', FileType::class)

      ->add('save',SubmitType::class);


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
        return 'appbundle_utilisateur';
    }


}
