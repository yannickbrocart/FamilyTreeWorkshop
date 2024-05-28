<?php
 
namespace App\DataFixtures;

use App\Entity\EnumeratedValues\KnownCharacterSetTypes;
use App\Entity\ComponentLevelDataTypes\Place;
use App\Entity\TopLevelDataTypes\Header;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use DateTime;

class PlaceFixtures extends Fixture
{
  
    public function load(ObjectManager $manager): void
    {
        // Création d'un lieu
        $place = new Place();
        $place->setName("Montluçon");
        $place->setLattitude('46.3333');
        $place->setLongitude('2.6');
        $manager->persist($place);

        // Création d'un lieu
        $place = new Place();
        $place->setName("Nice");
        $place->setLattitude('43.7031');
        $place->setLongitude('7.2661');
        $manager->persist($place);

        // Création d'un lieu
        $place = new Place();
        $place->setName("Saint-Amand Montrond");
        $place->setLattitude('46.7167');
        $place->setLongitude('2.5167');
        $manager->persist($place);
        
        $manager->flush();
   }
}