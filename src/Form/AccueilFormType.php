<?php

namespace App\Form;

use App\Entity\Sortie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccueilFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('dateHeureDebut')
            #->add('duree')
            ->add('dateLimiteInscription')
            ->add('sortiesOrganisees')
            #->add('nbInscriptionsMax')
            #->add('infosSortie')
            ->add('campus')
            #->add('etat')
            #->add('lieu')
            #->add('participants', AccueilFormType::class, [
             #   'data_class' => Participant::class
           # ])
            #->add('organisateur')
            ->add('option1', CheckboxType::class, [
                'label' => 'Sorties dont je suis organisateur',
                'required' => false])
            ->add('option2', CheckboxType::class, [
                'label' => 'Sorties auxquelles je suis inscrit',
                'required' => false])
            ->add('option3', CheckboxType::class, [
                'label' => 'Sorties auxquelles je ne suis pas inscrit',
                'required' => false])
            ->add('option4', CheckboxType::class, [
                'label' => 'Sorties passées',
                'required' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
