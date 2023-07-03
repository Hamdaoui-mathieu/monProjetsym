<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{

    private $requestStack;
    private $PlatRepository;

    public function __construct(RequestStack $requestStack, PlatRepository $PlatRepository)
    {
        $this->requestStack = $requestStack;
        $this->PlatRepository = $PlatRepository;

    }


    #[Route('/panier', name: 'app_panier')]

    public function panier(): Response
    {

        $session = $this->requestStack->getSession();
        $panier = $session->get('panier', []);
        $paniertotal = [];

        foreach ($panier as $id => $quantite) {
            $paniertotal[] = [
                'plat' => $this->PlatRepository->find($id),
                'quantite' => $quantite
            ];
        }
        $total = 0;
        foreach($paniertotal as $item) {
            $totalItem = $item['plat']->getPrix() * $item['quantite'];
            $total += $totalItem;
        }
        return $this->render('panier/panier.html.twig', [
            'items' => $paniertotal,
            'total' => $total
        ]);


    }
    #[Route('/ajout_panier/{id}', name: 'app_ajout_panier')]
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

        return $this->redirectToRoute( 'app_panier');
    }

// réduire les quantités

#[Route('/remove_plat/{id}', name: 'app_remove_plat')]
public function remove_plat(Plat $plat)
{
    $id= $plat->getId();
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

    return $this->redirectToRoute('app_panier');
}

// vider le plat du panier

    #[route('/delete_plat/{id}', name: 'app_delete_plat')]
    public function deleteItems(Plat $plat)
    {
        $id = $plat->getId();
        $session = $this->requestStack->getSession();        
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            unset($panier[$id]);
        }
        $session->set('panier', $panier);
        return $this->redirectToRoute('app_panier');
    }

// Vider entièrement le panier

    #[route('/delete_panier', name:'app_delete_panier')]
    public function deleteAllItems()
    {

        $session = $this->requestStack->getSession();   
        $session->remove('panier');

        return $this->redirectToRoute('app_panier');
    }
}
