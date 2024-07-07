<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ArticleProvider;
use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormFactoryInterface;

class BlogController extends AbstractController
{
    private ArticleProvider $articleProvider;
    private FormFactoryInterface $formFactory;

    public function __construct(ArticleProvider $articleProvider, FormFactoryInterface $formFactory)
    {
        $this->articleProvider = $articleProvider;
        $this->formFactory = $formFactory;
    }

    #[Route('/artykuly', name: 'main_page')]
    public function mainPage(): Response
    {
        $articles = $this->articleProvider->getAllArticles();

        return $this->render('article/article_list.html.twig', [
            'articles' => $articles,
        ]);
    }

    #[Route('/article/{id}', name: 'article_show', requirements: ['id' => '\d+'])]
    public function showArticle(int $id): Response
    {
        $article = $this->articleProvider->getArticleById($id);

        if (!$article) {
            throw $this->createNotFoundException('The article does not exist');
        }

        $content = strlen($article->getContent()) > 150 ? substr($article->getContent(), 0, 150) . '...' : $article->getContent();

        return $this->render('article/article_show.html.twig', [
            'article' => $article,
            'content' => $content,
        ]);
    }

    #[Route('/article/new', name: 'article_new')]
    public function newArticle(Request $request): Response
    {
        $article = new Article();
        $form = $this->formFactory->create(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->articleProvider->saveArticle($article);
            return $this->redirectToRoute('main_page');
        }

        return $this->render('article/article_new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/article/edit/{id}', name: 'article_edit', requirements: ['id' => '\d+'])]
    public function editArticle(Request $request, int $id): Response
    {
        $article = $this->articleProvider->getArticleById($id);

        if (!$article) {
            throw $this->createNotFoundException('The article does not exist');
        }

        $form = $this->formFactory->create(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->articleProvider->saveArticle($article);
            return $this->redirectToRoute('main_page');
        }

        return $this->render('article/article_edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/article/delete/{id}', name: 'article_delete', requirements: ['id' => '\d+'])]
    public function deleteArticle(int $id): Response
    {
        $article = $this->articleProvider->getArticleById($id);

        if (!$article) {
            throw $this->createNotFoundException('The article does not exist');
        }

        $this->articleProvider->deleteArticle($article);

        return $this->redirectToRoute('main_page');
    }
}
