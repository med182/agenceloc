<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Vehicule;
use App\Entity\Commandes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CommandesType extends AbstractType
{
    public function heures(){
        $heures=[];
        for ($i=8; $i <20 ; $i++) { 
        $hours[]=$i;
        }

        return $heures;
       }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
    
    
       
       
        $builder
        
            ->add('startAt', DateTimeType::class,[
                'date_widget'=>"single_text",
                "hours"=>$this->heures(),
                
                "label"=>"debut",
            ])
            ->add('endAt',
                DateTimeType::class,[
                    'date_widget'=>"single_text",
                    "hours"=>$this->heures(),
                 
                    "label"=>"fin",

            ])
            
            ->add('user',EntityType::class,[
             "class"=> User::class,
             "choice_label"=>"email",
            ])
  
    

        ->add('vehicule',EntityType::class,[
            'class'=>Vehicule::class,
            "choice_label"=>function($objet){
                return $objet->getTitre()." ".$objet->getMarque();
            }
        ]);
    
    }
       public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commandes::class,
        ]);
    }
}
