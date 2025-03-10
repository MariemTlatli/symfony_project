<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $article = new Article();
            $article->setTitle($faker->sentence(6));
            $article->setContent($faker->paragraph(10));
            $article->setImage($faker->imageUrl(640, 480, 'nature'));
            $article->setCreatedAt(new \DateTimeImmutable());

            $manager->persist($article);
        }

        $manager->flush();
    }
}
