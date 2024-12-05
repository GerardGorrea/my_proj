<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController 
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        dump('Controller executed'); // Afegeix una línia de depuració

        return $this->render('home/index.html.twig');
    }
}
