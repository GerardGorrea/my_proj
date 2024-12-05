<?php
// src/Controller/SecurityController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Comprovem si l'usuari ja està autenticat
        if ($this->getUser()) {
            return $this->redirectToRoute('app_post');
        }

        // Recupera l'error d'autenticació, si n'hi ha
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        // Renderitza el formulari de login
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
}

// namespace App\Controller;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
// use Symfony\Component\Form\Extension\Core\Type\PasswordType;
// use Symfony\Component\Form\Extension\Core\Type\TextType;
// use Symfony\Component\HttpFoundation\Request;

// class SecurityController extends AbstractController
// {
//     #[Route(path: '/login', name: 'app_login')]
//     public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
//     {
//         // Comprovem si l'usuari ja està autenticat
//         $user = $this->getUser();  
        
//         if ($user) {
//             // Si l'usuari està autenticat, redirigim a la pàgina principal
//             $userEmail = $this->getUser()->getUserIdentifier(); // Obtenir el correu de l'usuari
//             return $this->redirectToRoute('home'); // Redirigeix a la pàgina principal després de login
//         }

//         // Si l'usuari no està autenticat, mostrar el formulari d'inici de sessió
//         $error = $authenticationUtils->getLastAuthenticationError();
//         $lastUsername = $authenticationUtils->getLastUsername();

//         // Crear el formulari d'inici de sessió
//         $form = $this->createFormBuilder()
//             ->add('username', TextType::class, ['data' => $lastUsername])  // Carregar el darrer nom d'usuari
//             ->add('password', PasswordType::class)
//             ->getForm();

//         $form->handleRequest($request);

//         if ($form->isSubmitted() && $form->isValid()) {
//             // Symfony gestionarà l'autenticació i redirigirà a la pàgina de destí
//             return $this->redirectToRoute('home'); // Redirigeix a la pàgina principal després de login
//         }

//         // Retorna la vista del formulari d'inici de sessió
//         return $this->render('security/login.html.twig', [
//             'form' => $form->createView(),
//             'last_username' => $lastUsername,
//             'error' => $error,
//         ]);
//     }
// }
