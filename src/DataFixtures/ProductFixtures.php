<?php


namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $c = [
            1 => [
                'name' => 'Carotte'
            ],
            2 => [
                'name' => 'Brocoli'
            ],
            3 => [
                'name' => 'Poivron'
            ],
            4 => [
                'name' => 'Aubergine'
            ],
            5 => [
                'name' => 'Betterave'
            ],
            6 => [
                'name' => 'Potiron'
            ],
            7 => [
                'name' => 'Poivron'
            ]
        ];

        foreach ($c as $k => $value) {
            $product = new Product();
            $product->setName($value['name']);
            $manager->persist($product);
            $this->addReference('product-' . $k, $product);
        }

$manager->flush();
}
public function getDependencies():array
{
    return [
        MealFixtures::class,
    ];
}
}