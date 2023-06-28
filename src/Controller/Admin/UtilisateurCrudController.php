<?php

namespace App\Controller\Admin;

use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;


class UtilisateurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utilisateur::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('telephone'),
            TextField::new('adresse'),
            TextField::new('cp'),
            TextField::new('ville'),
            EmailField::new('email'),
            TextField::new('password'),
            ArrayField::new('roles'),
            AssociationField::new('commandes')
        ];
    }
    
}


// class UtilisateurCrudController extends AbstractCrudController
// {
//     private $hasher;

//     public static function getEntityFqcn(): string
//     {
//         return Utilisateur::class;
//     }

//     public function __construct(UserPasswordHasherInterface $hasher)
//     {
//         $this->hasher = $hasher;
//     }

//     public function configureCrud(Crud $crud): Crud
//     {
//         return $crud
//             ->setEntityLabelInPlural('Utilisateurs')
//             ->setEntityLabelInSingular('Utilisateur');
//     }
    
//     public function configureFields(string $pageName): iterable
//     {
//         return [
//             TextField::new('nom'),
//             TextField::new('prenom'),
//             TextField::new('telephone'),
//             TextField::new('adresse'),
//             TextField::new('cp'),
//             TextField::new('ville'),
//             EmailField::new('email'),
//             TextField::new('password'),
//             ArrayField::new('roles'),
//             AssociationField::new('commandes')
//         ];
//     }
    
//     public function persistEntity(EntityManagerInterface $entityManager, $entityInstance):void
//     {
//         $this->hashPassword($entityInstance);
//         parent::persistEntity($entityManager, $entityInstance);
//     }

//     public function updateEntity(EntityManagerInterface $entityManager, $entityInstance):void
//     {
//         $this->hashPassword($entityInstance);
//         parent::updateEntity($entityManager,$entityInstance);
//     }

//     private function hashPassword(Utilisateur $user): void
//     {
//         $plainPassword = $user->getPassword();

//         if (!empty($plainPassword)) {
//             $hashedPassword = $this->hasher->hashPassword($user, $plainPassword);
//             $user->setPassword($hashedPassword);
//         }
//     }
// }

