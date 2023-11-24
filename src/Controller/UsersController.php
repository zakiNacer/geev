<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Categorie;
use App\Entity\Evenement;
use App\Entity\Participation;
// use Doctrine\Persistence\ManagerRegistry;
use App\Entity\ProduitGestion;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class UsersController extends AbstractController
{
    private $entityManager;
    private $security;

    
    public function __construct(EntityManagerInterface $entityManager, Security $security){
    $this->entityManager=$entityManager;
    $this->security = $security;

    }

    

    #[Route('/users', name: 'app_users')]
    public function index(): Response
    {   
        $evenement = null;
        $categoriesDemande = null;
        $categoriesDon = null;

        // un user faut quil soit participé a un evenement dans levenement l'associer avec participations , il faut chercher les produits , il faut afficher levenement + participation->category.produits 
        $user=$this->security->getUser();
        if($user == null)
            return $this->redirect("/login");

        $participation=$this->entityManager->getRepository(Participation::class)->findOneBy(['user'=>$user]);
    
        if($participation != null){
            $evenement=$this->entityManager->getRepository(Evenement::class)->find($participation->getEvenement());
            $categories = $this->entityManager->getRepository(Categorie::class)->findAll();

            $produitsDemande = array();

            $produitGestionsDemandes = $this->entityManager->getRepository(ProduitGestion::class)->findBy(['participation'=>$participation, 'etatProduit'=>0]);
            
            foreach($produitGestionsDemandes as $produitGestion){
                array_push($produitsDemande, $produitGestion->getProduitExemplary()->getProduit());
            }

            //Faut qu'on trie les produits demandées par leur categorie
            $categoriesDemande = array();
            for($ind = 0; $ind < count($categories); $ind++){
                $categorie = $categories[$ind];
                $categoriesDemande[$ind] = [$categorie, array()];
                foreach($produitsDemande as $produitDemande){
                    if($produitDemande->getPrduitCategorie() == $categorie)
                        array_push($categoriesDemande[$ind][1], $produitDemande);
                }
            }

            // $produitsDons = array();

            // $produitGestionsDons = $this->entityManager->getRepository(ProduitGestion::class)->findBy(['participation'=>$participation, 'etatProduit'=>1]);
            //     foreach( $produitGestionsDons as $produitGestion){
            //         array_push($produitsDons, $produitGestion->getProduit());
            //     }

            //     //Faut qu'on trie les produits demandées par leur categorie
        
            // $categoriesDons = array() ;
            //     $counteur=0;
            //     for($ind = 0; $ind < count($categories); $ind++){
            //         // on doit compter le nombre de produit pour chaque cat si il superieur a 0 on laffiche
            //         if(count($categories[$ind]->getProduits()) > 0){
                        
            //             $categorie = $categories[$ind];
            //              $categoriesDons[$counteur] = [$categorie, array()];
            //             foreach($produitsDemande as $produitDons){
            //                 if($produitDons->getPrduitCategorie() == $categorie)
            //                     array_push( $categoriesDons[$counteur][1], $produitDons);
            //             }
            //             $counteur++;
            //         }
            //     }
                
            $produitsDon = array();

            $produitGestionsDons = $this->entityManager->getRepository(ProduitGestion::class)->findBy(['participation'=>$participation, 'etatProduit'=>1]);
            foreach($produitGestionsDons as $produitGestion){
                array_push($produitsDon, $produitGestion->getProduitExemplary()->getProduit());
            }

            $categoriesDon = array();
            for($ind = 0; $ind < count($categories); $ind++){
                $categorie = $categories[$ind];
                $categoriesDon[$ind] = [$categorie, array()];
                foreach($produitsDon as $produitDon){
                    if($produitDon->getPrduitCategorie() == $categorie)
                        array_push($categoriesDon[$ind][1], $produitDon);
                }
            }

            // $categoriesDon = array();
            // $categoriesInd = 0;
            // for($ind=0; $ind<count($produitsDon); $ind++){
            //     $counter = 0;
            //     while($counter < count($categories) && !in_array($produitsDon[$ind], $categories[$counter]->getProduits())){
            //             $counter++;
            //     }

            //     if($counter < count($categories)){
            //             if($categoriesDon[$categoriesInd] == null)
            //             $categoriesDon[$categoriesInd] = [$categories[$counter], array()];
            //                 array_push($categoriesDon[$categoriesInd][1], $produitsDon[$ind]);
            //                 $categoriesInd++;
            //     }

            // } 
        }
        

        return $this->render('users/index.html.twig', [
            'evenement' => $evenement,
            'categorieDemande'=>$categoriesDemande,
            'categoriesDon'=>$categoriesDon,
            
        ]);


    }
}
