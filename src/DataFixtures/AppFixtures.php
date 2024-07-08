<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $article = new Article();
        $article->setContent(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
             sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
             Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
             nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
             in reprehenderit in voluptate velit esse cillum dolore eu fugiat
             nulla pariatur. Excepteur sint occaecat cupidatat non proident,
             sunt in culpa qui officia deserunt mollit anim id est laborum.'
        );
        $article->setTitle("pierwszy artykuł");
        $manager->persist($article);

        $article2 = new Article();
        $article2->setContent(
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
             sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
             nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
             in reprehenderit in voluptate velit esse cillum dolore eu fugiat
             nulla pariatur. Excepteur sint occaecat cupidatat non proident,
             sunt in culpa qui officia deserunt mollit anim id est laborum.'
        );
        $article2->setTitle('Drugi artykuł');
        $article->setDateAdded(new \DateTime('7.7.2024'));
        $manager->persist($article2);
//
//        $article3 = new Article();
//        $article2->setContent(
//            'Lorem ipsum dolor sit amet, consectetur adipiscing elit,
//             sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
//            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
//             nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
//             in reprehenderit in voluptate velit esse cillum dolore eu fugiat
//             nulla pariatur. Excepteur sint occaecat cupidatat non proident,
//             sunt in culpa qui officia deserunt mollit anim id est laborum.');
//
//        $article3->setTitle('Trzeci artykuł');
//        $manager->persist($article3);

        $manager->flush();
    }
}
