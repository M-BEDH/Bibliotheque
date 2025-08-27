<?php

namespace App\Controller;

use App\Entity\Books;
use App\Entity\Auteur;
use App\Entity\Categories;
use App\Repository\BooksRepository;
use App\Repository\AuteurRepository;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(AuteurRepository $auteurRepository, CategoriesRepository $categoryRepository ): Response
    {
        return $this->render('home/index.html.twig', [
            'auteurs' => $auteurRepository->findAll(),
            'categories' =>$categoryRepository->findAll()
        ]);
    }

    #[Route('/{id}/auteur_liste', name: 'app_home_list_auteur')]
    public function listAuteur(Auteur $auteur, BooksRepository $bookRepository): Response
    {
        return $this->render('home/listAuteur.html.twig', [
            'auteur' => $auteur
        ]);
    }
    
    
    #[Route('/{id}/category_liste', name: 'app_home_list_category')]
    public function listCategorie(Categories $category, Books $book, Auteur $auteur): Response
    {
        return $this->render('home/listCategory.html.twig', [
            'book' => $book,
            'category' => $category,
            'auteur' => $auteur
        ]);
    }
}