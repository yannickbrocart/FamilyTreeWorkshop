<?php

namespace App\Controller;

use App\Repository\GedcomRepository;
use App\Serializer\SerializeModel;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\SecurityBundle\Security;
use App\Entity\User;
use App\Repository\UserRepository;

class DataController extends AbstractController
{ 
    public function __construct( 
        protected Security $security) { }
    
        #[Route('/genealogy/manage/getallbyuser', name: 'app_genealogy_manage_get_allbyuser')]
        public function getAllGenealogiesByUser(Request $request, GedcomRepository $gedcomRepository, SerializeModel $serializeModel): Response
        {
            $response = new Response();
            $userEmail = $request->getPayload()->get('userEmail');
            try { 
                $gedcomList = $gedcomRepository->getGedcomByUserEmail($userEmail);
            } catch(Exception $e) { 
                return $response->setStatusCode(Response::HTTP_NO_CONTENT);
            }
            $response->setContent($serializeModel->serializeAllToManageGenealogy($gedcomList));
            return $response->setStatusCode(Response::HTTP_OK);
        }

    #[Route('/genealogy/manage/getbyid/{id}', name: 'app_genealogy_manage_get_byid')]
    public function getGenealogyById(int $id, GedcomRepository $gedcomRepository, SerializeModel $serializeModel): Response
    {
        $response = new Response();
        try { 
            $gedcom = $gedcomRepository->find($id);
        } catch(Exception $e) {
            return $response->setStatusCode(Response::HTTP_NO_CONTENT);
        }
        $response->setContent($serializeModel->serializeOneToManageGenealogy($gedcom));
        return $response->setStatusCode(Response::HTTP_OK);
    }

    #[Route('/genealogy/manage/renamebyid/{id}', name: 'app_genealogy_manage_rename_byid')]
    public function renameGenealogyById(int $id, Request $request, GedcomRepository $gedcomRepository, SerializeModel $serializeModel): Response
    {
        $response = new Response();
        try { 
            $gedcom = $gedcomRepository->findOneBy(['id' => $id]);
            $gedcom->setName($request->getPayload()->get('name'));
            $gedcomRepository->update($gedcom, true);
        } catch(Exception $e) {
            return $response->setStatusCode(Response::HTTP_NOT_MODIFIED);
        }
        try { 
            $gedcomList = $gedcomRepository->findAll();
        } catch(Exception $e) { 
            return $response->setStatusCode(Response::HTTP_NO_CONTENT);
        }
        $response->setContent($serializeModel->serializeAllToManageGenealogy($gedcomList));
        return $response->setStatusCode(Response::HTTP_OK);
    }

    #[Route('/genealogy/manage/deletebyid/{id}', name: 'app_genealogy_manage_delete_byid')]
    public function deleteGenealogyById(int $id, GedcomRepository $gedcomRepository, SerializeModel $serializeModel): Response
    {
        $response = new Response();
        try { 
            $gedcom = $gedcomRepository->findOneBy(['id' => $id]);
            $gedcomRepository->remove($gedcom, true);
        } catch(Exception $e) {
            return $response->setStatusCode(Response::HTTP_NOT_MODIFIED);
        }
        try { 
            $gedcomList = $gedcomRepository->findAll();
        } catch(Exception $e) { 
            return $response->setStatusCode(Response::HTTP_NO_CONTENT);
        }
        $response->setContent($serializeModel->serializeAllToManageGenealogy($gedcomList));
        return $response->setStatusCode(Response::HTTP_OK);
    }

    #[Route('/genealogy/manage/getuseridbylogin', name: 'app_genealogy_manage_getuserid_bylogin')]
    public function getUserIdByLogin(Request $request, UserRepository $userRepository): Response
    {
        $response = new Response();
        $userLogin = $request->getPayload()->get('userLogin');
        try { 
            $user = $userRepository->findOneBy(['email' => $userLogin]);
        } catch(Exception $e) {
            return $response->setStatusCode(Response::HTTP_NOT_FOUND);
        }
        $response->setContent($user->getId());
        return $response->setStatusCode(Response::HTTP_OK);
    }

    // public function createGenealogy(String $gedcomName, GedcomRepository $gedcomRepository)
    // {
        
    //     try { 
    //         $gedcom = new Gedcom();
    //         $gedcomRepository->persist($gedcom->setName($gedcomName), true);
    //     } catch(Exception $e) {
    //         return false;
    //     }
    //     return true;
    // }

}
