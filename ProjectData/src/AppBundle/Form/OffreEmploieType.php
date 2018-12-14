<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class OffreEmploieType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre',TextType::class,array('attr'=>array('class'=>"form-control form-control-alternative"
        , "placeholder" => "titre")))
            ->add('description',TextType::class,array('attr'=>array('class'=>"form-control form-control-alternative"
        , "placeholder" => "description")))
            ->add('poste',TextType::class,array('attr'=>array('class'=>"form-control form-control-alternative"
        , "placeholder" => "poste")))
            ->add('salaire',TextType::class,array('attr'=>array('class'=>"form-control form-control-alternative"
        , "placeholder" => "salaire")))
            ->add('promotion',TextType::class,array('attr'=>array('class'=>"form-control form-control-alternative"
        , "placeholder" => "promotion")))
            ->add('media_offre',FileType::class)
             ->add('Submit',SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\OffreEmploie'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_offreemploie';
    }


}
