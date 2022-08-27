<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/user", name="app_user")
     */
    public function index(Request $request): Response
    {

        return $this->render('user/login.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    /**
     * @Route("/home", name="home")
     */
    public function home(): Response
    {
        return $this->render('home.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
}
