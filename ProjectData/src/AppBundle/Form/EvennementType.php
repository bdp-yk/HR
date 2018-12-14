<?php

namespace AppBundle\Form;

use AppBundle\Entity\Media;
use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class EvennementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array('attr' => array('class' => "form-control form-control-alternative")))
            ->add('description', TextType::class, array('attr' => array('class' => "form-control form-control-alternative")))
            ->add('dateDepart', TextType::class, array('attr' => array('class' => "form-control form-control-alternative")))
            ->add('dateFin', TextType::class, array('attr' => array('class' => "form-control form-control-alternative")))
            ->add('place', TextType::class, array('attr' => array('class' => "form-control form-control-alternative")))
            ->add('organisateur', TextType::class, array('attr' => array('class' => "form-control form-control-alternative")))
            ->add('descriptionOrganisateur', TextType::class, array('attr' => array('class' => "form-control form-control-alternative")))
            ->add('accompagnement', TextType::class, array('attr' => array('class' => "form-control form-control-alternative")))
            ->add('frais', TextType::class, array('attr' => array('class' => "form-control form-control-alternative")))
            ->add('transport', TextType::class, array('attr' => array('class' => "form-control form-control-alternative")))
            ->add('limitInscription', TextType::class, array('attr' => array('class' => "form-control form-control-alternative")))
            ->add('responsable_evennement', EntityType::class, array(

                'class' => User::class,
                'attr' => array(
                    'class' => 'form-control select2'

                )))
            ->add('Submit', SubmitType::class,array('attr'=>array('class'=>"btn btn-success")));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Evennement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_evennement';
    }


}
