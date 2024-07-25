<?php

namespace App\Controller\Files;

use App\Entity\ComponentLevelDataTypes\Name;
use App\Entity\ComponentLevelDataTypes\NamePiece;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Gedcom;
use App\Entity\TopLevelDataTypes\Individual;
use App\Parser\ParseGedcomToModel;
use App\Repository\ComponentLevelDataTypes\NameRepository;
use App\Serializer\SerializeModel;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\EnumeratedValues\KnownNameTypes;
use App\Entity\EnumeratedValues\KnownSexTypes;



class ImportGedcomFileController extends AbstractController
{
    public Gedcom $gedcom;
    public $gedcomFile;
    public Response $response;
    public int $statusCode;
    public NameRepository $nameRepository;
  
    public function __construct(NameRepository $nameRepository) {
        $this->response = new Response();
        $this->gedcom = new Gedcom();
        $this->nameRepository = $nameRepository;
    }

    
    #[Route('/files/import', name: 'app_import_gedcom_file')]
    public function importGedcomFile(Request $request, ParseGedcomToModel $parseGedcomToModel, 
        SerializeModel $serializeModel, EntityManagerInterface $em): JsonResponse
    {
        $this->response = new JsonResponse();
        if ($this->openFile($request->getPayload()->get('file'))) {
            $this->gedcom = $parseGedcomToModel->Parse($this->gedcom, $this->gedcomFile);
            fclose($this->gedcomFile);
        } else {
            return $this->response->setStatusCode($this->statusCode);   
        }
        
        // try {
        //     $this->saveGenealogy($request->getPayload()->get('genealogyName'), $em);           
        // } catch(Exception $e) {
        //     return $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
        // }

        // try {
        //     echo($this->loadGenealogy($em));           
        // } catch(Exception $e) {
        //     return $this->response->setStatusCode(Response::HTTP_NOT_FOUND);
        // }

        $this->response->headers->set('Content-Type', 'application/json');
        $this->response->setContent($serializeModel->serializeToView($this->gedcom));
        $this->response->setStatusCode(Response::HTTP_OK);
        return $this->response;
    }

    
    private function openFile($gedcomFile)
    {
        if (file_exists($gedcomFile)) {
            $this->gedcomFile = fopen($gedcomFile, 'r');
            if (!$this->gedcomFile) $this->statusCode = Response::HTTP_EXPECTATION_FAILED;
            else return true;
        } else {            
            $this->statusCode = Response::HTTP_NOT_FOUND;
        }
    }


    private function saveGenealogy($gedcomName, $em)
    {
        $this->gedcom->setName($gedcomName);


        $namePiece1 = new NamePiece();
        $namePiece1->setGiven('Yannick');
        $namePiece1->setSurname('Brocart');
        $namePiece2 = new NamePiece();
        $namePiece2->setGiven('Luz');
        $namePiece2->setSurname('Cerezo Brocart');
        
        $name1 = new Name();
        $name1->setType(KnownNameTypes::Birth);
        $name1->addNamePiece($namePiece1);
        $name1->addNamePiece($namePiece2);
       
        $individual1 = new Individual();
        $individual1->setSex(KnownSexTypes::M);
    
        var_dump($namePiece1);
        var_dump($name1);
        var_dump($individual1);
        
        $em->persist($individual1);
        $em->flush();



        foreach ($this->gedcom->getIndividuals() as $individual) {
            
           
            
            // if ($individual->getIndividualEvents()->getDeathDetail()) {
            //     $deathEventDetail = $individual->getIndividualEvents()->getDeathDetail()->getEventDetail();
            //     if ($deathEventDetail) $individual->getIndividualEvents()->setDeath(true);
            // } else $individual->getIndividualEvents()->setDeath(false);
            
            // foreach ($individual->getIndividualEvents() as $individualEvent) {
            //     echo('coucou');
            //     foreach ($individualEvent->getIndividualEventDetails() as $individualEventDetail) { 
            //         foreach ($individualEventDetail->getEventDetails() as $eventDetail) { 
            //             foreach ($eventDetail->getPlaces() as $place) { 
            //                 $em->persist($place);
            //             }
            //         $em->persist($eventDetail);
            //         }
            //     $em->persist($individualEventDetail);    
            //     }
            // $em->persist($individualEvent);
            // $em->flush();   
            
            // }
                        
            // $em->persist($individual);
            // $em->flush();       
            
            // $em->persist($individual->getNames()[0]->getNamePieces()[0]);
            // var_dump($individual->getNames()[0]->getNamePieces()[0]);
            // $em->flush();  
            // echo('coucou');

            // foreach ($individual->getNames() as $name) {
            //     foreach ($name->getNamePieces() as $namePiece) {
            //         $em->persist($namePiece);
            //         var_dump($namePiece->getId());
            //         $em->flush();
            //         echo('coucou');
            //     }
            //     $em->persist($name);  
            //     $em->flush();  
            // }    
            // $em->flush();  
        }
        
        // foreach ($this->gedcom->getFamilies() as $family) {
        //     $em->persist($family);
        //     $em->flush();
        // }

        // $em->persist($this->gedcom->getIndividuals(1));
        // $em->persist($this->gedcom->getHeader());
        // $em->persist($this->gedcom);
        // $em->flush();
    }

    private function loadGenealogy(EntityManagerInterface $entityManager): Response
    {
        $response = new Response();
        $names = $this->nameRepository->findAll();
        var_dump($names[0]->getType());
        var_dump($names[0]->getNamePieces()[1]);

        return $response;
    }

}