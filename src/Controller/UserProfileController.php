<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/user/profile', name: 'app_user_profile_')]
final class UserProfileController extends AbstractController
{
    #[Route('/', name: 'space')]
    public function index(): Response
    {
        return $this->render('user_profile/index.html.twig', [
            'controller_name' => 'UserProfileController',
        ]);
    }

    #[Route('/orders', name: 'orders')]
    public function orders(): Response
    {
        return $this->render('user_profile/index.html.twig', [
            'controller_name' => 'Commandes utilisateur',
        ]);
    }
}
