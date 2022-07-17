<?php

namespace App\Form;

use App\Entity\Hotel;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HotelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',\Symfony\Component\Form\Extension\Core\Type\TextType::class,['label'=>'app.name'])
            ->add('city',\Symfony\Component\Form\Extension\Core\Type\TextType::class,['label'=>'app.city'])
            ->add('star',\Symfony\Component\Form\Extension\Core\Type\TextType::class,['label'=>'app.star'])
            ->add('facilities',\Symfony\Component\Form\Extension\Core\Type\TextType::class,['label'=>'app.facilities'])
            ->add('price',\Symfony\Component\Form\Extension\Core\Type\TextType::class,['label'=>'app.price'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Hotel::class,
        ]);
    }
}
