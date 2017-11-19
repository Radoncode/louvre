<?php

namespace LP\ReservationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;



class TicketType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname',TextType::class,array('label'=>'Nom'))
            ->add('name',TextType::class,array('label'=>'Prénom'))
            ->add('birthday',DateType::class,array('label'=>'Date de Naissance','widget'=>'single_text','html5'=>false,'format'=>'dd/MM/yy','attr'=>array('class'=>'datepicker-js-js')))
            ->add('country',CountryType::class,array('label'=>'Pays'))
            ->add('reduction',CheckboxType::class,array('label'=>'Réduction (Attention ! Une attestation accompagnant votre billet vous sera demandé à l\'entrée attestant que vous bénéficiez de la réduction) ','required'=>false))
            ->add('save',SubmitType::class,array('label'=>'Ajouter'))
            ->add('saveAndAdd',SubmitType::class,array('label'=>'Valider'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LP\ReservationBundle\Entity\Ticket'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lp_reservationbundle_ticket';
    }


}
