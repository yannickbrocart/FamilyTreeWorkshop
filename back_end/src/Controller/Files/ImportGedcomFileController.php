<?php

namespace App\Controller\Files;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Gedcom;
use App\Parser\ParseGedcomToModel;
use App\Serializer\SerializeModel;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class ImportGedcomFileController extends AbstractController
{
    public Gedcom $gedcom;
    public $gedcomFile;
    public Response $response;
    public int $statusCode;
  
    public function __construct() {
        $this->response = new Response();
        $this->gedcom = new Gedcom();
    }

    
    #[Route('/files/import', name: 'app_import_gedcom_file')]
    public function importGedcomFile(Request $request, ParseGedcomToModel $parseGedcomToModel, 
        SerializeModel $serializeModel, EntityManagerInterface $em): JsonResponse
    {
        $this->response = new JsonResponse();
        if ($this->openFile($request->getPayload()->get('file'))) {
            $this->gedcom = $parseGedcomToModel->Parse($this->gedcom, $this->gedcomFile);
            fclose($this->gedcomFile);
        } else return $this->response->setStatusCode($this->statusCode);   
        // try {
        //     $this->saveGenealogy($request->getPayload()->get('genealogyName'), $em);           
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
        foreach ($this->gedcom->getIndividuals() as $individual) {
            foreach ($individual->getNames() as $name) {
                $em->persist($name);
                $em->flush();
            }            
            if ($individual->getIndividualEvents()->getDeathDetail()) {
                $deathEventDetail = $individual->getIndividualEvents()->getDeathDetail()->getEventDetail();
                if ($deathEventDetail) $individual->getIndividualEvents()->setDeath(true);
            } else $individual->getIndividualEvents()->setDeath(false);
            
            // $em->persist($individual);
            // $em->flush();            
        }
        
        foreach ($this->gedcom->getFamilies() as $family) {
            $em->persist($family);
            $em->flush();
        }

        $em->persist($this->gedcom->getIndividuals(1));
        $em->persist($this->gedcom->getHeader());
        $em->flush();
    }

}