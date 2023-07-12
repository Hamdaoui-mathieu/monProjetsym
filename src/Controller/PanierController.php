<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Detail;
use App\Entity\Plat;
use App\Repository\PlatRepository;
use App\Repository\UtilisateurRepository;
use App\Service\PanierService;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{

    private $requestStack;
    private $PlatRepository;
    private $em;
    private $ps;

    public function __construct(RequestStack $requestStack, PlatRepository $PlatRepository, EntityManagerInterface $em, PanierService $ps)
    {
        $this->requestStack = $requestStack;
        $this->PlatRepository = $PlatRepository;
        $this->em=$em;
        $this->ps=$ps;

    }


    #[Route('/panier', name: 'app_panier')]

    public function panier(): Response
    {
        $session = $this->requestStack->getSession();   
        
        // dd($session->get('panier'));

      $paniertotal = $this->ps->panier();
      $total = $this->ps->getTotal();

        // $cookie = new Cookie("nom du cookie", json_encode($panier), strtotime('tomorrow'));
        // $res = new Response();
        // $res->headers->setcookie($cookie);
        // $res->send();

        return $this->render('panier/panier.html.twig', [
            'items' => $paniertotal,
            'total' => $total
        ]);

// Ajouter de la quantité

    }
    #[Route('/ajout_panier/{id}', name: 'app_ajout_panier')]
    public function addItems(int$id)
    {
        $panier = $this->ps->addItems($id);

        return $this->redirectToRoute( 'app_panier');
    }

// réduire les quantités

#[Route('/remove_plat/{id}', name: 'app_remove_plat')]
public function remove_plat(Plat $plat)
{
    $id= $plat->getId();
    
    $panier=$this->ps->removeItems($id);

    return $this->redirectToRoute('app_panier');
}

// vider le plat du panier

    #[route('/delete_plat/{id}', name: 'app_delete_plat')]
    public function deleteItems(Plat $plat)
    {
        $id = $plat->getId();
        $panier = $this->ps->deleteItems($id);

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



    #[route('/valider_panier', name:'app_valider_panier')]
    public function validerAllItems(Request $request, UtilisateurRepository $userRepo)
    {
       
        $userMail = $this->getUser()->getUserIdentifier();
        $vraiUser = $userRepo->findOneBy(["email"=> $userMail]);

       $panierTotal = $this->ps->panier();

       
       $total = $this->ps->getTotal();

    //    dd($panierTotal, $total);
        $cmd = new Commande();
        $cmd->setDateCommande(new DateTime());
        $cmd->setUtilisateur($vraiUser);
        $cmd->setTotal($total);
        $cmd->setEtat(1);

        $this->em->persist($cmd);

        foreach($panierTotal as $panier){
            $plat = $panier["plat"];
            $qte = $panier["quantite"];

            $d = new Detail();
            $d->setCommande($cmd);
            $d->setPlat($plat);
            $d->setQuantite($qte);

            $this->em->persist($d);

        
           }
           $email = (new TemplatedEmail())

           ->from(new Address('thedistrict@afpa.fr', 'theDistrict'))
           ->to($vraiUser->getEmail())
           ->subject('Récapitulatif de votre commande')
           ->htmlTemplate('panier/confirmation_commande.html.twig');



        $this->em->flush();
        $session = $this->requestStack->getSession();   
        $session->remove('panier');


        return $this->redirectToRoute('app_panier');
    
    }
}
