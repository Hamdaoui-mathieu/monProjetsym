<?php

namespace App\Controller;

use App\Repository\CommandeRepository;
use App\Repository\DetailRepository;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class TestController extends AbstractController
{


    #[Route(path: '/test', name: 'app_test')]
    public function testEmail(CommandeRepository $cmmdRepo, PlatRepository $platRepo, DetailRepository $detailRepo): Response
    {
        $commande = $cmmdRepo->find(11);

        // dd($commande->getUtilisateur());
        

        $lignes_details = $commande->getDetails()->getValues();
        // foreach($lignes_details as $l){
        //     $platId = $l->getPlat();
        //     $plat = $platRepo->find($platId);
        //     //            
        //     // dd($plat);
        // }
        // $plat = $platId;

        // dd($plat);
        return $this->render('panier/confirmation_commande.html.twig', [
            'commande'=> $commande,
            'details'=> $lignes_details
        ]);
    }

    
}
