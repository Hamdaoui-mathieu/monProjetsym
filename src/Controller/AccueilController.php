<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Entity\Plat;
use App\Entity\Categorie;
use App\Entity\Utilisateur;
use App\Repository\PlatRepository;
use App\Repository\CategorieRepository;
use App\Repository\CommandeRepository;
use App\Repository\ContactRepository;
use App\Repository\DetailRepository;
use App\Repository\UtilisateurRepository;
use Egulias\EmailValidator\Result\Reason\DetailedReason;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;







class AccueilController extends AbstractController
{
    private $platRepo;
    private $categorieRepo;
    private $detailRepo;
    private $contactRepo;
    private $utilisateurRepo;
    private $commandeRepo;

    public function __construct(PlatRepository $platRepo, CategorieRepository $categorieRepo, DetailRepository $detailRepo, ContactRepository $contactRepo, 
    UtilisateurRepository $utilisateurRepo, CommandeRepository $commandeRepo)
    {
        $this->platRepo = $platRepo;
        $this->categorieRepo = $categorieRepo;
        $this->detailRepo = $detailRepo;
        $this->contactRepo = $contactRepo;
        $this->utilisateurRepo = $utilisateurRepo;
        $this->commandeRepo = $commandeRepo;
    }

    
    #[Route('/accueil', name: 'app_accueil')]
    public function accueil(): Response
    {
        $catPop = $this->detailRepo->findCategoriesPopulaires();
        // dd($catPop);

        $plats = $this->platRepo->findPlatPopulaires();
        $categories = $this->categorieRepo->find6Categories();

        return $this->render('accueil/accueil.html.twig', [
            'controller_name' => 'AccueilController',
            'plats' => $plats,
            'categories' => $categories
        ]);
    }


    #[Route('/categorie', name: 'app_categorie')]
    public function categorie(): Response
    {
        // $plats = $platRepo->findAll();
        $categories = $this->categorieRepo->findAll();

        return $this->render('categorie/index.html.twig', [
            'controller_name' => 'AccueilController',
            // 'plats' => $plats,
            'categories' => $categories
        ]);
    }


    #[Route('/plat', name: 'app_plat')]
    public function plat(): Response
    {
        $plats = $this->platRepo->findAll();

        return $this->render('plat/index.html.twig', [
            'controller_name' => 'AccueilController',
            'plats' => $plats
        ]);
    }


    // #[Route('/contact', name: 'app_contact')]
    // public function contact(): Response
    // {
    //     return $this->render('accueil/contact.html.twig', [
    //         'controller_name' => 'AccueilController',
    //     ]);
    // }


    #[Route('/connexion', name: 'app_connexion')]
    public function connection(): Response
    {
        return $this->render('accueil/connexion.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    // #[Route('/infos_account', name: 'app_info_account')]
    
    // public function info_account( Security $security): Response
    // {
    //     $this->denyAccessUnlessGranted('ROLE_USER');
    //     $usertest = $security->getUser();

        
        
    //     // $user = $this->utilisateurRepo ->find($id);
        
    //     return $this->render('registration/infos_account.html.twig', [
    //     'controller_name' => 'AccueilController',
    //     'user' => $usertest
    //     ]);
    // }

    #[Route('/detail_plat/{libelle}', name: 'app_detail_plat')]
    public function detail_plat(Plat $id): Response
    {
        $plat = $this->platRepo->find($id);

        return $this->render('plat/detail_plat.html.twig', [
            'controller_name' => 'AccueilController',
            'plat' => $plat
        ]);
    }


    #[Route('/plat_categorie/{libelle}', name: 'app_plat_categorie')]
    public function plat_categorie(Categorie $id): Response
    {
        $plat = $this->platRepo->findAll();
        $idcat = $this->categorieRepo->find($id);

        return $this->render('categorie/plat_categorie.html.twig', [
            'controller_name' => 'AccueilController',
            'plat' => $plat,
            'idcat' => $idcat
            
        ]);
    }


    #[Route('/politique_de_confidentialite', name: 'app_politique_confidentialite')]
    public function politique_confidentialite(): Response
    {
        return $this->render('accueil/politique_confidentialite.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/mentions_legales', name: 'app_mentions_legales')]
    public function mentions_legales(): Response
    {
        return $this->render('accueil/mentions_legales.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/Administration', name:'app_Administration')]
    public function Administration(): Response
    {
        // $this->denyAccessUnlessGranted('ROLE_CLIENT');

        return $this->render('accueil/Administration.html.twig', [
            'controller_name' => 'AccueilController'
        ]);
    }

    #[Route('/search', name: 'app_search')]
    public function search(Request $request): Response
    {
        $search = $request->request->get('search');
        $plat = $this->platRepo->findSearch($search);
        if($plat){
            $this->addFlash('success', "Votre recherche a retourné " .count($plat). " résultats.");
        }else{
            $this->addFlash('warning', "Il n'y a aucun résultat pour votre recherche.");
            // $message = "Il n'y a aucun résultat pour votre recherche.";
        }

        return $this->render('accueil/search.html.twig', [
            'controller_name' => 'AccueilController',
            'plat'=> $plat,
            // 'message' => $message
        ]);
    }


}

