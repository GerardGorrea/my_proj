<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GoogleController extends AbstractController
{
    /**
     * Ruta para redirigir al usuario a Google para la autenticación
     *
     * @Route("/login/google", name="login_google")
     */
    public function loginWithGoogle()
    {
        // Redirige al servicio de autenticación de Google.
        // return $this->get('hwi_oauth.router')->redirectToService('google');
    }

    /**
     * Ruta para el callback que Google llama después de la autenticación
     *
     * @Route("/login/check-google", name="login_check_google")
     */
    public function checkGoogle()
    {
        // Esta acción maneja la respuesta de Google después de la autenticación.
        // Aquí puedes manejar los datos del usuario y redirigirlo a una página segura de la aplicación.
        return $this->redirectToRoute('home'); // O a cualquier otra página de tu aplicación
    }
}
