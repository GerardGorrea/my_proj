<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use \DateTime;


class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Títol del post']
            ])
            ->add('type', ChoiceType::class, [
                'choices' => Post::TYPES,
                'attr' => ['class' => 'form-control']
            ])
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Descripció del post']
            ])
            ->add('file', FileType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false
            ])
            ->add('creation_date', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'data' => new \DateTime()
            ])
            ->add('url', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'URL del post']
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn mt-3',
                'style'=>'background-color: #E7333F; color:white;']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
