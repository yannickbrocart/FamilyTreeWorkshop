<?php
 
namespace App\DataFixtures;

use App\Entity\EnumeratedValues\KnownCharacterSetTypes;
use App\Entity\Gedcom;
use App\Entity\TopLevelDataTypes\Header;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use DateTime;
use App\Repository\UserRepository;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class GedcomFixtures extends Fixture implements OrderedFixtureInterface
{
    private $userRepository;
    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function getOrder(): int
    {
        return 30; // smaller means sooner
    }

    public function load(ObjectManager $manager): void
    {
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
        $manager->persist($gedcom);
        
        // Création d'un Gedcom
        $header_2 = new Header();
        $header_2->setVersionNumber('5.5.51');
        $header_2->setVersionForm('lineage-linked');
        $header_2->setCharactereSet(KnownCharacterSetTypes::UTF_8);
        $gedcom_2 = new Gedcom();
        $gedcom_2->setName("Généalogie des Rois Anglais");
        $gedcom_2->setUser($user2);
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
        $gedcom_3->setUser($user2);
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

        $manager->flush();
   }
}