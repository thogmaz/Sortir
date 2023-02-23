<?php

namespace App\Form;

use App\Entity\Sortie;
use Symfony\Component\Form\AbstractType;
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
            ->add('nbInscriptionsMax')
            #->add('infosSortie')
            ->add('campus')
            ->add('etat')
            ->add('lieu')
            ->add('participants', AccueilFormType::class, [
                'data_class' => Participant::class
            ])
            ->add('organisateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
