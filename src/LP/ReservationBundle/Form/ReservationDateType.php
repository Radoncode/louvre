<?php

namespace LP\ReservationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\Datetype;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ReservationDateType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          ->add('dated',Datetype::class,array('label'=>'Jour de la Visite','widget'=>'single_text','html5'=>false,'format'=>'dd/MM/yy','attr'=>array('class'=>'js-datepicker')))
          ->add('number',NumberType::class,array('label'=>'Nombre de billets'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LP\ReservationBundle\Entity\ReservationDate'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lp_reservationbundle_reservationdate';
    }


}
