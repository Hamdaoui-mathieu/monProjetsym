<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('objet', TextType::class, [
                'required' => false,
                'constraints' => [
                    new Assert\Length([
                        'min' => 2,
                        'max' => 50,
                        'minMessage' => 'Test Your first name must be at least {{ limit }} characters long',
                        "maxMessage" => 'Your first name cannot be longer than {{ limit }} characters',

                    ])
                ],

            ])
            ->add('email')

            //On a rajouté un label et on a rendu le champ optionnel en 
            //donnant la valeur FALSE à l'attribut required


            ->add('message',TextareaType::class,
                [
                    'label' => 'Votre message',
                    'required' => false
                ]
            )
            ->add('save', SubmitType::class, ['label' => 'Envoyer le message']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
