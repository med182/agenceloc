<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
            "required"=>false,
            "label"=>"Titre",
            "attr"=>[
                "placeholder"=>"saisir le titre du véhicule"
            ]

            ])
            ->add('marque', TextType::class,[
                "required"=>false,
                "label"=>"Marque du véhicule",
                "attr"=>[
                    "placeholder"=>"saisir la marque du véhicule",
                ]
            ])
            ->add('modele', TextType::class,[
                "required"=>false,
                "label"=>"Modele du véhicule",
                "attr"=>[
                    "placeholder"=>"Saisir le modele du véhicule",
                ]
            ])
            ->add('description', TextareaType::class,[
                "required"=>false,
                "label"=>"Modele du véhicule",
          
            ])
            ->add('prix', MoneyType::class,[
                "required"=>false,
              
                "currency"=>"USD",
            ])
            ->add('imageFile', FileType::class,[
                "label"=>"Image",
                "required"=> false,
                "mapped"=>false,
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,[
              
            ]
        ]);
    }
}
