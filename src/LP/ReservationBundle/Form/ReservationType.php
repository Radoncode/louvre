<?php

namespace LP\ReservationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
             ->add('type',ChoiceType::class,array('label'=>'Type de billet (Plus de billet journée disponible après 14H)',
                                                              'choices'=>array("Billet Journée (jusqu'à 14H)"=> 'billetjournee',
                                                                               'Billet demi-journée (à partir de 14H)'=>'demijournee'),
                                                                               'choice_attr'=> function($val){
                                                                                                                return['id'=>$val];
                                                                                                                }))
             ->add('name',TextType::class,array('label'=>'Nom'))
             ->add('firstname',TextType::class,array('label'=>'Prénom'))

             ->add('birthday',DateType::class,array('label'=>'Date de naissance',
                                                                'widget'=>'single_text',
                                                                'html5'=>false,
                                                                'format'=>'dd/MM/yy',
                                                                'attr'=>array('class'=>'datepicker-js')))

             ->add('email',EmailType::class,array('label'=>'E-mail'))
             ->add('country',CountryType::class,array('label'=>'Pays'))

             ->add('reservationdate',Datetype::class,array('label'=>'Jour de la Visite',
                                                                       'widget'=>'single_text',
                                                                       'html5'=>false,
                                                                       'format'=>'dd/MM/yy',
                                                                       'attr'=>array('class'=>'js-datepicker')));

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LP\ReservationBundle\Entity\Reservation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lp_reservationbundle_reservation';
    }


}
