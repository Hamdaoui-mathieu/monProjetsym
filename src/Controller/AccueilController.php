<?php

namespace App\Controller;

use App\Form\ContactFormType;
use App\Repository\PlatRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;






class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function accueil(PlatRepository $platRepo): Response
    {
        $plats = $platRepo->findAll();

        return $this->render('accueil/accueil.html.twig', [
            'controller_name' => 'AccueilController',
            'plats' => $plats
        ]);
    }


    #[Route('/categorie', name: 'app_categorie')]
    public function categorie(): Response
    {
        return $this->render('accueil/categorie.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }


    #[Route('/plat', name: 'app_plat')]
    public function plat(): Response
    {
        return $this->render('accueil/plat.html.twig', [
            'controller_name' => 'AccueilController',
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


    #[Route('/detail_plat', name: 'app_detail_plat')]
    public function detail_plat(): Response
    {
        return $this->render('accueil/detail_plat.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }


    #[Route('/plat_categorie', name: 'app_plat_categorie')]
    public function plat_categorie(): Response
    {
        return $this->render('accueil/plat_categorie.html.twig', [
            'controller_name' => 'AccueilController',
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


    #[Route('/search', name: 'app_search')]
    public function search(): Response
    {
        return $this->render('accueil/search.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
