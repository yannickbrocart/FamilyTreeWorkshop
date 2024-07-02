<?php
 
namespace App\DataFixtures;

use App\Entity\ComponentLevelDataTypes\Place;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class PlaceFixtures extends Fixture implements OrderedFixtureInterface
{
  
    public function getOrder(): int
    {
        return 20; // smaller means sooner
    }

    public function load(ObjectManager $manager): void
    {
        // Création d'un lieu
        $place = new Place();
        $place->setName("Montluçon");
        $place->setLatitude('46.3333');
        $place->setLongitude('2.6');
        $manager->persist($place);

        // Création d'un lieu
        $place = new Place();
        $place->setName("Nice");
        $place->setLatitude('43.7031');
        $place->setLongitude('7.2661');
        $manager->persist($place);

        // Création d'un lieu
        $place = new Place();
        $place->setName("Saint-Amand Montrond");
        $place->setLatitude('46.7167');
        $place->setLongitude('2.5167');
        $manager->persist($place);
        
        $manager->flush();
   }
}