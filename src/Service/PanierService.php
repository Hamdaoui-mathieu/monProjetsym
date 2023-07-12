<?php

namespace App\Service;

use App\Entity\Commande;
use App\Entity\Detail;
use App\Entity\Plat;
use App\Repository\PlatRepository;
use App\Repository\UtilisateurRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierService
{

    private $requestStack;
    private $PlatRepository;
    private $em;

    public function __construct(RequestStack $requestStack, PlatRepository $PlatRepository, EntityManagerInterface $em)
    {
        $this->requestStack = $requestStack;
        $this->PlatRepository = $PlatRepository;
        $this->em=$em;

    }

    public function panier(){
        $session = $this->requestStack->getSession();
        $panier = $session->get('panier', []);
        $paniertotal = [];

        foreach ($panier as $id => $quantite) {
            $paniertotal[] = [
                'plat' => $this->PlatRepository->find($id),
                'quantite' => $quantite
            ];
        }
        

        return $paniertotal;
    }

    public function getTotal(){
        $session = $this->requestStack->getSession();
    
        $paniertotal = $this->panier();

        $total = 0;
        foreach($paniertotal as $item) {
            $totalItem = $item['plat']->getPrix() * $item['quantite'];
            $total += $totalItem;
        }

        return $total;
    }

    public function addItems(int$id)
    {
        $session = $this->requestStack->getSession();
        $panier = $session->get('panier', []);

        if(!empty($panier[$id])){
            $panier[$id]++;
        }else{
            $panier[$id] = 1;
        
        }
        $session->set('panier', $panier);

        return $panier;
    }

    public function removeItems(int $id){
        $session = $this->requestStack->getSession();
        $panier = $session->get('panier', []);
    
        // On retire le produit du panier s'il n'y a qu'un seul exemplaire sinon on réduit sa quantité : 
        if (!empty($panier[$id]))
        {
            if ($panier[$id] > 1)
                $panier[$id]--;
        } else {
            unset($panier[$id]);
        }
        $session->set('panier', $panier);

        return $panier;
    }

    public function deleteItems($id)
    {
        
        $session = $this->requestStack->getSession();        
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }
        $session->set('panier', $panier);
        return $panier;
        
    }

    




}