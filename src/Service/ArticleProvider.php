<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;

class ArticleProvider
{
    private ArticleRepository $articleRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(ArticleRepository $articleRepository, EntityManagerInterface $entityManager)
    {
        $this->articleRepository = $articleRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @return Article[]
     */
    public function getAllArticles(): array
    {
        return $this->articleRepository->findAll();
    }

    /**
     * @param int $id
     * @return Article|null
     */
    public function getArticleById(int $id): ?Article
    {
        return $this->articleRepository->find($id);
    }

    /**
     * @param Article $article
     */
    public function saveArticle(Article $article): void
    {
        $this->entityManager->persist($article);
        $this->entityManager->flush();
    }

    /**
     * @param Article $article
     */
    public function deleteArticle(Article $article): void
    {
        $this->entityManager->remove($article);
        $this->entityManager->flush();
    }
}
