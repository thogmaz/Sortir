<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Sortie;
use App\Service\SearchData;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', EntityType::class, [
                'class' => Sortie::class,
                'required' => false
            ])
            ->add('dateHeureDebut', DateTimeType::class, [
                'label'=>'Date et heure de début',
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'required'=>false
            ])
            #->add('duree')
            ->add('dateLimiteInscription', DateTimeType::class, [
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'required'=>false
            ])

            ->add('campus', EntityType::class, [
                'class' => Campus::class,
                'required' => true,
            ])

            ->add('option1', CheckboxType::class, [
                'label' => 'Sorties dont je suis organisateur',
                'required' => false,
                'mapped'=>false
            ])
            ->add('option2', CheckboxType::class, [
                'label' => 'Sorties auxquelles je suis inscrit',
                'required' => false,
                'mapped'=>false])
            ->add('option3', CheckboxType::class, [
                'label' => 'Sorties auxquelles je ne suis pas inscrit',
                'required' => false,
                'mapped'=>false])
            ->add('option4', CheckboxType::class, [
                'label' => 'Sorties passées',
                'required' => false,
                'mapped'=>false])
        ;
    }
    function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class
        ]);

    }
}