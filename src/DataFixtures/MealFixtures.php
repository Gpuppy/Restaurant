<?php

namespace App\DataFixtures;

use App\Entity\Meal;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class MealFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $product = $this->getReference('product-', $faker->numberBetween(1, 6));
            $product = new Meal();
            $meal->setTitle($faker->sentence);
            $meal->setName('meal '.$i);
            $meal->setContent($faker->text);
            $meal->setCreatedAt(new \DateTime('now'));
            $meal->setAttachment($faker->imageUrl(640,480, 'meals', true));
            $meal->setPrice($faker->randomFloat(2));
            $meal->setArtist($product);

            $manager->persist($meal);

        }

        $manager->flush();
    }
}