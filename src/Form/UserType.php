<?php
namespace App\Form;

use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Introduïu el vostre correu electrònic']
            ])
            ->add('password', TextType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Introduïu la contrasenya']
            ])
            ->add('photo', FileType::class, [
                'attr' => ['class' => 'form-control'],
                'required' => false
            ])
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Descripció del vostre perfil']
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn mt-3', 'style' => 'background-color: #E7333F; color:white;']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
