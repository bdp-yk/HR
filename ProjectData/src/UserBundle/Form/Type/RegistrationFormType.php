<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace UserBundle\Form\Type;

use AppBundle\Entity\Departement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    /**
     * @var string
     */
    private $class;

    /**
     * @param string $class The User class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

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
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,

                'options' => array(
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'autocomplete' => 'new-password',
                        'class' => 'form-control'
                    ),
                ),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
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
            ));

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->class,
            'csrf_token_id' => 'registration',
        ));
    }

    // BC for SF < 3.0

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->getBlockPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fos_user_registration';
    }
}
