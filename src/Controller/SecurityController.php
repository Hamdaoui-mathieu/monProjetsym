<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    private $requestStack;
    private $UtilisateurRepository;
    private $em;

public function __construct(RequestStack $requestStack, UtilisateurRepository $utilisateurRepository, EntityManagerInterface $em)
{
    $this->requestStack = $requestStack;
    $this->UtilisateurRepository = $utilisateurRepository;
    $this->em=$em;
}
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        //redirigé vers infos utilisateur si l'user est connecté
        if ($this->getUser()) {
            
            return $this->redirectToRoute('app_infos_account');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
}




//     #[Route(path: '/delete_account/{id}', name: 'app_delete_account')]
//     public function DeleteAccount($id)
// {
//     $em = $this->getDoctrine()->getManager();
//     $userRepo = $em->getRepsitory(Utilisateur::class);

//     $user = $utilisateurRepo->find($id);
//     $em->remove($user);

//     $em->flush();
    
    
// }
}
