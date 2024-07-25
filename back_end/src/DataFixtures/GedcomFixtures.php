<?php
 
namespace App\DataFixtures;

use App\Entity\EnumeratedValues\KnownCharacterSetTypes;
use App\Entity\Gedcom;
use App\Entity\TopLevelDataTypes\Header;
use App\Entity\TopLevelDataTypes\Individual;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use DateTime;
use App\Repository\UserRepository;
use App\Repository\TopLevelDataTypes\IndividualRepository;
use App\Repository\ComponentLevelDataTypes\PlaceRepository;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use App\Entity\ComponentLevelDataTypes\Place;
use App\Entity\EnumeratedValues\KnownSexTypes;
use App\Entity\EnumeratedValues\KnownNameTypes;
use App\Entity\ComponentLevelDataTypes\IndividualEvent;
use App\Entity\ComponentLevelDataTypes\IndividualEventDetail;
use App\Entity\ComponentLevelDataTypes\EventDetail;
use App\Entity\ComponentLevelDataTypes\Name;
use App\Entity\ComponentLevelDataTypes\NamePiece;

class GedcomFixtures extends Fixture implements OrderedFixtureInterface
{
    private $userRepository;
    private $individualRepository;
    private $placeRepository;
    
    public function __construct(UserRepository $userRepository, IndividualRepository $individualRepository, PlaceRepository $placeRepository)
    {
        $this->userRepository = $userRepository;
        $this->individualRepository = $individualRepository;
        $this->placeRepository = $placeRepository;
    }
    
    public function getOrder(): int
    {
        return 30; // smaller means sooner
    }

    public function load(ObjectManager $manager): void
    {
        $place_1 = new Place();
        $place_2 = new Place();
        $place_3 = new Place();
        $place_1 = $this->placeRepository->findOneBy(['id' => 1]);
        $place_2 = $this->placeRepository->findOneBy(['id' => 2]);
        $place_3 = $this->placeRepository->findOneBy(['id' => 3]);

        // Création d'un individu
        $individual_1 = new Individual();
        $individual_1->setId(1);
        $individual_1->setSex(KnownSexTypes::M);
        $namePiece_1 = new NamePiece();
        $namePiece_1->setSurname('Yannick');
        $namePiece_1->setGiven('Brocart');
        $name_1 = new Name();
        $name_1->addNamePiece($namePiece_1);
        $name_1->setType(KnownNameTypes::Birth);
        $individual_1->addName($name_1);
        $individualEvent_1 = new IndividualEvent();
        $individualEventDetail_1 = new IndividualEventDetail();
        $eventDetail_1 = new EventDetail();
        $eventDetail_1->setDate(new DateTime('1971-08-15'));
        $eventDetail_1->setPlace($place_1);
        $individualEventDetail_1->setEventDetail($eventDetail_1);
        $individualEvent_1->setBirthDetail($individualEventDetail_1);
        $individualEvent_1->setDeath(false);
        $individual_1->addIndividualEvent($individualEvent_1);
        $manager->persist($individual_1);
        $manager->persist($name_1);
        $manager->persist($namePiece_1);
        $manager->persist($eventDetail_1);
        $manager->persist($individualEventDetail_1);
        $manager->persist($individualEvent_1);

        // Création d'un individu
        $individual_2 = new Individual();
        $individual_2->setId(2);
        $individual_2->setSex(KnownSexTypes::M);
        $namePiece_2 = new NamePiece();
        $namePiece_2->setSurname('Pierre-Alain');
        $namePiece_2->setGiven('Brocart');
        $name_2 = new Name();
        $name_2->addNamePiece($namePiece_2);
        $name_2->setType(KnownNameTypes::Birth);
        $individual_2->addName($name_2);
        $individualEvent_2 = new IndividualEvent();
        $individualEventDetail_2 = new IndividualEventDetail();
        $eventDetail_2 = new EventDetail();
        $eventDetail_2->setDate(new DateTime('1945-05-20'));
        $eventDetail_2->setPlace($place_2);
        $individualEventDetail_2->setEventDetail($eventDetail_2);
        $individualEvent_2->setBirthDetail($individualEventDetail_2);
        $individualEvent_2->setDeath(false);
        $individual_2->addIndividualEvent($individualEvent_2);
        $manager->persist($individual_2);
        $manager->persist($name_2);
        $manager->persist($namePiece_2);
        $manager->persist($eventDetail_2);
        $manager->persist($individualEventDetail_2);
        $manager->persist($individualEvent_2);

        // Création d'un individu
        $individual_3 = new Individual();
        $individual_3->setId(3);
        $individual_3->setSex(KnownSexTypes::F);
        $namePiece_3 = new NamePiece();
        $namePiece_3->setSurname('Jacqueline');
        $namePiece_3->setGiven('Lieudenot');
        $name_3 = new Name();
        $name_3->addNamePiece($namePiece_3);
        $name_3->setType(KnownNameTypes::Birth);
        $individual_3->addName($name_3);
        $individualEvent_3 = new IndividualEvent();
        $individualEventDetail_3 = new IndividualEventDetail();
        $eventDetail_3 = new EventDetail();
        $eventDetail_3->setDate(new DateTime('1947-04-10'));
        $eventDetail_3->setPlace($place_3);
        $individualEventDetail_3->setEventDetail($eventDetail_3);
        $individualEvent_3->setBirthDetail($individualEventDetail_3);
        $individualEvent_3->setDeath(false);
        $individual_3->addIndividualEvent($individualEvent_3);
        $manager->persist($individual_3);
        $manager->persist($name_3);
        $manager->persist($namePiece_3);
        $manager->persist($eventDetail_3);
        $manager->persist($individualEventDetail_3);
        $manager->persist($individualEvent_3);

        $user1 = new User();
        $user2 = new User();
        $user1 = $this->userRepository->findOneBy(['id' => 1]);
        $user2 = $this->userRepository->findOneBy(['id' => 2]); 

        // Création d'un Gedcom
        $header = new Header();
        $header->setVersionNumber('5.5.51');
        $header->setVersionForm('lineage-linked');
        $header->setCharactereSet(KnownCharacterSetTypes::UTF_8);
        $gedcom = new Gedcom();
        $gedcom->setName("Généalogie de Yannick Brocart");
        $gedcom->setUser($user1);
        $gedcom->setCreationDate(new DateTime('2024-02-01'));
        $gedcom->setLastModifiedDate(new DateTime('2024-02-19'));
        $gedcom->setHeader($header);
        $gedcom->setTrailer('TRLR');
        $gedcom->addIndividual($individual_1);
        $gedcom->addIndividual($individual_2);
        $gedcom->addIndividual($individual_3);
        $manager->persist($gedcom);
        
        // Création d'un Gedcom
        $header_2 = new Header();
        $header_2->setVersionNumber('5.5.51');
        $header_2->setVersionForm('lineage-linked');
        $header_2->setCharactereSet(KnownCharacterSetTypes::UTF_8);
        $gedcom_2 = new Gedcom();
        $gedcom_2->setName("Généalogie des Rois Anglais");
        $gedcom_2->setUser($user1);
        $gedcom_2->setCreationDate(new DateTime('2024-02-05'));
        $gedcom_2->setLastModifiedDate(new DateTime('2024-02-16'));
        $gedcom_2->setHeader($header_2);
        $gedcom_2->setTrailer('TRLR');
        $manager->persist($gedcom_2);

        // Création d'un Gedcom
        $header_3 = new Header();
        $header_3->setVersionNumber('5.5.51');
        $header_3->setVersionForm('lineage-linked');
        $header_3->setCharactereSet(KnownCharacterSetTypes::UTF_8);
        $gedcom_3 = new Gedcom();
        $gedcom_3->setName("Généalogie de Luz Cerezo Brocart");
        $gedcom_3->setUser($user1);
        $gedcom_3->setCreationDate(new DateTime('2024-02-10'));
        $gedcom_3->setLastModifiedDate(new DateTime('2024-02-19'));
        $gedcom_3->setHeader($header_3);
        $gedcom_3->setTrailer('TRLR');
        $manager->persist($gedcom_3);

        // Création d'un Gedcom
        $header_4 = new Header();
        $header_4->setVersionNumber('5.5.51');
        $header_4->setVersionForm('lineage-linked');
        $header_4->setCharactereSet(KnownCharacterSetTypes::UTF_8);
        $gedcom_4 = new Gedcom();
        $gedcom_4->setName("Généalogie de Louis XIV");
        $gedcom_4->setUser($user1);
        $gedcom_4->setCreationDate(new DateTime('2024-02-15'));
        $gedcom_4->setLastModifiedDate(new DateTime('2024-02-16'));
        $gedcom_4->setHeader($header_4);
        $gedcom_4->setTrailer('TRLR');
        $manager->persist($gedcom_4);

        // Création d'un Gedcom
        $header_5 = new Header();
        $header_5->setVersionNumber('5.5.51');
        $header_5->setVersionForm('lineage-linked');
        $header_5->setCharactereSet(KnownCharacterSetTypes::UTF_8);
        $gedcom_5 = new Gedcom();
        $gedcom_5->setName("Généalogie de Louis XVIII");
        $gedcom_5->setUser($user2);
        $gedcom_5->setCreationDate(new DateTime('2024-04-25'));
        $gedcom_5->setLastModifiedDate(new DateTime('2024-05-07'));
        $gedcom_5->setHeader($header_5);
        $gedcom_5->setTrailer('TRLR');
        $manager->persist($gedcom_5);
        

        // Création d'un Gedcom
        $header_6 = new Header();
        $header_6->setVersionNumber('5.5.51');
        $header_6->setVersionForm('lineage-linked');
        $header_6->setCharactereSet(KnownCharacterSetTypes::UTF_8);
        $gedcom_6 = new Gedcom();
        $gedcom_6->setName("Généalogie de Jean Moulins");
        $gedcom_6->setUser($user2);
        $gedcom_6->setCreationDate(new DateTime('2024-05-03'));
        $gedcom_6->setLastModifiedDate(new DateTime('2024-05-03'));
        $gedcom_6->setHeader($header_6);
        $gedcom_6->setTrailer('TRLR');
        $manager->persist($gedcom_6);

        $manager->flush();
   }
}