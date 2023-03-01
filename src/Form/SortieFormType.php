<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Lieu;
use App\Service\SortieData;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => true
            ])
            ->add('dateHeureDebut', DateType::class, [
                'widget' => 'single_text',
                'required' => true
            ])
            ->add('dateLimiteInscription', DateType::class, [
                'widget' => 'single_text',
                'required' => true
            ])
            ->add('nbInscriptionsMax', TextType::class, [
                'required' => true
            ])
            ->add('duree', IntegerType::class, [
                'label' => 'Durée, en minutes',
                'required' => true,
                'attr' => [
                    'min' => 5,
                    'max' => 240,
                    'step' => 5,
                ],
            ])
            ->add('infosSortie', TextareaType::class, [
                'required' => false
            ])
            ->add('campus', EntityType::class, [
                'class' => Campus::class,
                'required' => true,
            ])

        ->add('lieu', EntityType::class, [
        'class' => Lieu::class,
        'choice_label'=>'nom',
        'required' => true
    ]);

        #->add('rue0')
        #->add('codePostal0')
        #->add('latitude0')
        #->add('longitude0');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SortieData::class,
        ]);
    }
}
