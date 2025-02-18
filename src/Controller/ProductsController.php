<?php

namespace App\Controller;

use App\Entity\Products;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/products', name: 'app_products_')]
final class ProductsController extends AbstractController
{
    #[Route('/', name: 'products')]
    public function index(): Response
    {
        return $this->render('products/index.html.twig', [
            'controller_name' => 'Liste des produits',
        ]);
    }

    #[Route('/{slug}', name: 'detail')]
    public function detail(Products $products): Response
    {
       

        dd($products);
        return $this->render('detail/index.html.twig', [
            'controller_name' => 'Detail du produit',
        ]);
    }
}
