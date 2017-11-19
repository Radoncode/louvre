<?php

namespace LP\ReservationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ReservationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
      
        $builder
           ->add('reservationdate',ReservationDateType::class,array('label'=>' '))
           ->add('type',ChoiceType::class,array('label'=>'Type de billet (Plus de billet journée disponible après 14H)','choices'=>array("Billet Journée (jusqu'à 14H)"=> 'billetjournee','Billet demi-journée (à partir de 14H)'=>'demijournee'),'choice_attr'=> function($val, $key, $index){
                  return['id'=>$val];
           }))
           ->add('firstname',TextType::class,array('label'=>'Nom'))
           ->add('name',TextType::class,array('label'=>'Prénom'))
           ->add('country',CountryType::class,array('label'=>'Pays'))
           ->add('birthday',DateType::class,array('label'=>'Date de naissance','widget'=>'single_text','html5'=>false,'format'=>'dd/MM/yy','attr'=>array('class'=>'datepicker-js')))
           ->add('email',EmailType::class,array('label'=>'E-mail'))
           ->add('valider',SubmitType::class);

    }
    
    /**
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
