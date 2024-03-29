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

class CommandeController extends AbstractController
{
    #[Route('/commande', name: 'app_commande')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {

        //     // On crée une instance de Contact
        //     $message = new Contact();
        //     // Traitement des données du formulaire
        //     $datonta = $form->getData();
        //     $message = $data;

        //     // dd($message);
        //     $entityManager->persist($message);
        //     $entityManager->flush();

        //     //Redirection vers accueil
        //     $this->addFlash('success', 'Message envoyé!');

        //     return $this->redirectToRoute('app_accueil');
        // }
    
        return $this->render('contact/index.html.twig', [
            // 'form' => $form->createView(),
            'form' => $form
        ]);
    }
}