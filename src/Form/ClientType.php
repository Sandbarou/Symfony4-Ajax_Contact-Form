<?php

namespace App\Form;


use App\Entity\Client;
use App\Entity\CpAutocomplete;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Doctrine\ORM\EntityManagerInterface;



class ClientType extends AbstractType
{

    private $em;


    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('prenom', TextType::class, array(
                'required'    => true,
            ))
            ->add('nom', TextType::class, array(
                'required'    => true,
            ))
            ->add('email', EmailType::class, array(
                'required'    => true,
            ))
            ->add('adresse', TextType::class, array(
                'required'    => true,
            ))
            ->add('cp_client', TextType::class, array(
                'required'    => true,
                'attr' => [
                    'maxlength' => 5
                ]
            ))
            ->add('ville_client', ChoiceType::class, array(
                'required'    => true,
            ));


        $formModifier = function(FormInterface $form, $CP) {

            $villecodepostal = $this->em->getRepository(CpAutocomplete::class)->findBy(array('CP' => $CP));

            if ($villecodepostal) {
                $villes = array();
                foreach  ($villecodepostal as $ville) {
                    $villes[$ville->getVILLE()] = $ville->getVILLE();
                }
            } else {
                $villes = null;
            }

            $form->add('ville_client', ChoiceType::class, array('required' => true,
                'choices'   => $villes));

        };

        $builder->get('cp_client')->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) use ($formModifier) {

            $formModifier($event->getForm()->getParent(), $event->getForm()->getData());

        });

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }

}

