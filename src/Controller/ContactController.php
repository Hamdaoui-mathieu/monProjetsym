<?php

namespace App\Controller;
use App\Entity\Contact;
use App\Form\DemoFormType;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\http\Attribute\Isgranted;

// class ContactController extends AbstractController
// {

//     #[Route('/contact', name: 'app_contact')]
//     public function index(Request $request): Response
//     {
//         $form = $this->createForm(ContactFormType::class);

//         return $this->render('contact/index.html.twig', [
//             'form' => $form
//         ]);
//     }
// }

class ContactController extends AbstractController
{

    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
    //   $this->denyAccessUnlessGranted('ROLE_CLIENT');

        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // On crée une instance de Contact
            $message = new Contact();
            // Traitement des données du formulaire
            $data = $form->getData();
            $message = $data;

            // dd($message);
            $entityManager->persist($message);
            $entityManager->flush();

            //Redirection vers accueil
            $this->addFlash('success', 'Message envoyé!');

            return $this->redirectToRoute('app_accueil');
        }
    
        return $this->render('contact/index.html.twig', [
            // 'form' => $form->createView(),
            'form' => $form
        ]);
    }
}