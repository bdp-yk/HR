<?php

namespace AppBundle\Form;

use AppBundle\Entity\Media;
use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
        $builder->add('title')
            ->add('description')
            ->add('dateDepart'
            )->add('dateFin')
            ->add('place')
            ->add('organisateur')
            ->add('descriptionOrganisateur')
            ->add('accompagnement')
            ->add('frais')
            ->add('transport')
            ->add('limitInscription')
            ->add('responsable_evennement',EntityType::class, array(

                'class' => User::class,
                'choice_label' => 'nom',
                'attr' => array(
                    'class' => 'select2'

            )))
            ->add('media_event', FileType::class)
        ->add('Submit',SubmitType::class);
           // ->add('adherants')
            //->add('media_event');
    }/**
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
