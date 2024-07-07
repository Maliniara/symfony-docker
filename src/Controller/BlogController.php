<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class BlogController extends AbstractController
{
    public function __construct(
        private ArticleRepository $articleRepository,
    )
    {
    }
    #[Route('/artykuly', name: 'main_page')]
    public function mainPage(): Response
    {
        $articles = $this->articleRepository->findAll();

        return $this->render('blog/artykuly.html.twig',['articles'=>$articles]);
    }
    #[Route('article/{article', 'blog-article')]
    public function showarticle(Article $article): Response
    {
        $article = $this->articleRepository->find($article->getId());
        return $this->render('blog/artykuly.html.twig',['article'=>$article]);
    }
}
