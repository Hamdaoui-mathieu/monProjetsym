<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\RegistrationFormType;
use App\Repository\UtilisateurRepository;
use App\Security\EmailVerifier;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;
    private $utilisateurRepo;
    private $requestStack;

    public function __construct(EmailVerifier $emailVerifier, RequestStack $requestStack,UtilisateurRepository $utilisateurRepo)
    {
        $this->emailVerifier = $emailVerifier;
        $this->utilisateurRepo = $utilisateurRepo;
        $this->requestStack = $requestStack;
        
    }
    

    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
    
        $user = new Utilisateur();
        $user->setRoles(['ROLE_USER']);
        
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();

            // generate a signed url and email it to the user
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('thedistrict@afpa.fr', 'theDistrict'))
                    ->to($user->getEmail())
                    ->subject('Veuillez confirmez votre Email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );
            // do anything else you need here, like send an email
            
        $this->addflash('success2', 'Votre inscription a bien été pris en compte. un mail de confirmation vous a été envoyé, pensez à véifier vos spams!');

            return $this->redirectToRoute('app_login');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success2', 'Votre adresse Email a bien été vérifié.');

        return $this->redirectToRoute('app_login');
    }


    #[route('/info_account', name: 'app_infos_account')]
    public function modificateAccount():response
    {
        $user = $this->getUser();
 
        return $this->render('registration/infos_account.html.twig', [
                'controller_name'=> 'RegistrationController',
                'user' => $user

    ]);
    }

    #[Route('/infos_account', name: 'app_info_account')]
    
    public function info_account( Security $security): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $user = $security->getUser();

        
        
        // $user = $this->utilisateurRepo ->find($id);
        
        return $this->render('registration/infos_account.html.twig', [
        'controller_name' => 'RegistrationController',
        'user' => $user
        ]);
    }


    // #[route('/delete_plat/{id}', name: 'app_delete_plat')]
    // public function deleteItems(Plat $plat)
    // {
    //     $id = $plat->getId();
    //     $panier = $this->ps->deleteItems($id);

    //     return $this->redirectToRoute('app_panier');
    // }



    // #[route('/delete_account', name: 'app_delete_account')]
    // public function DeleteAccount(Utilisateur $utilisateur):response
    // {
    //     $id = $this->$utilisateur->getId();
    //     $user = $this->em->DeleteAccount($id);
        
 
    //     return $this->redirectToRoute('app_accueil');

    // }



    // #[route('/modificate_account', name: 'app_modificate_account')]
    // public function modificateAccount(Request $request, UserPasswordHasherInterface $userPasswordHasher):response
    // {
    //     $user = $this->getUser();
    //     $form = $this->createForm(EditUserFormType::class, $user);
    //     $form->handleRequest($request);

    //     if($form->isSubmitted() && $form->isValid()){

    //         $em = $this->getDoctrine()->getManager();
    //         $newPassword = $form->get('plainPassword')['first']->getData();

    //         // Grâce au service, on génère un nouveau hash de notre nouveau mot de pase 
    //         $hashOfNewPassword = $userPasswordHasher->hashPassword($user, $newPassword);

    //         //On change l'ancien mt de passe hashé par le nouveau que l'on a généré juste au dessus
    //         $user->setPassword($hashOfNewPassword);

    //         $em->flush();

    //         $this->addFlash('success', 'Profil modifié avec succès.');
    //         return $this->redirectToRoute('app_infos_account');

    //     }

    //     return $this->render('registration/infos_account.html.twig', [
    //             'controller_name'=> 'RegistrationController,'
    // ]);
    // }
}
