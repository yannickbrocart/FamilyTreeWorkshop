<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class AppFixtures extends Fixture implements OrderedFixtureInterface
{
    public function getOrder(): int
    {
        return 10; // smaller means sooner
    }
    
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
