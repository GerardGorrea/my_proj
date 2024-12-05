<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use App\Form\PostType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    private $em;

    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }

    #[Route('/post', name: 'app_post')]
    public function index(Request $request): Response
    {
       $post = new Post();
       $form = $this->createForm(PostType::class, $post);
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
        $user = $this->getUser();
        $post->setUser($user);
        $this->em->persist($post);
        $this->em->flush();
        return $this->redirectToRoute('app_post');
       }
        return $this->render('post/index.html.twig', [
            'form'=>$form->createView()
        ]);
    }
    
}