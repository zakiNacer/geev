<?php

namespace App\Controller;

use DateTime;
use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\Evenement;
use App\Entity\Participation;
use App\Entity\ProduitExemplary;
use App\Entity\ProduitGestion;
use Doctrine\ORM\EntityManager;
use App\Repository\EvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EvenementController extends AbstractController
{
    private $security;

    function __construct(Security $security)
    {
        $this->security = $security;
    }
    #[Route('/evenements', name: 'app_evenements')]
    public function index(EvenementRepository $evenement): Response
    {
        $evenements = $evenement->findAll();
        
        return $this->render('evenement/index.html.twig', [
            'evenements' => $evenements
        ]);
    }

    #[Route('/evenements/{id}', name: 'app_evenement')]
    public function read(Request $request, EntityManagerInterface $entity, $id): Response
    {
        $user = $this->security->getUser(); //Authenticated user

        $evenement = $entity->getRepository(Evenement::class)->find($id);
        $produitEntity = $entity->getRepository(Produit::class);
        
        //Verifions si la date colelct de l'evenement est passé ou non
        if($this->datePasse($evenement->getDateCollect())){ //Date collecte est passé (On doit afficher formularie de dons)
            
            if(!empty($_POST) && isset($_POST['produits'])){
                //Okay, the form od demande  is submitting
                if($user == null){
                    return $this->redirectToRoute('app_login');
                }
                
                $participation = $participation=$entity->getRepository(Participation::class)->findOneBy(['user'=>$user, 'evenement'=>$evenement]);
                
                    //return $this->redirectToRoute('app_users');

                $produitsIds = $_POST['produits'];
               
                foreach($produitsIds as $produitId){
                    $produit = $produitEntity->find($produitId);
                    $exemplaire = new ProduitExemplary();
                    $exemplaire->setProduit($produit);
                    $produitGestion = new ProduitGestion();
                    $produitGestion->setParticipation($participation);
                    $produitGestion->setProduitExemplary($exemplaire);
                    $produitGestion->setEtatProduit(1);
                    
                    
                    $entity->persist($exemplaire);
                    $entity->persist($produitGestion);
                    $participation->addProduitGestion($produitGestion);
                }
                
                $entity->persist($participation);
                $entity->flush();

                return $this->redirectToRoute('app_users');
            }
            
            $produitsDemande = array();
            $participation = $entity->getRepository(Participation::class)->findBy(['evenement'=>$evenement]);
            
            $produitGestionsDemandes = $entity->getRepository(ProduitGestion::class)->findBy(['participation'=>$participation, 'etatProduit'=>0]);
            foreach($produitGestionsDemandes as $produitGestion){
                array_push($produitsDemande, $produitGestion->getProduitExemplary()->getProduit());
            }

            //Faut qu'on lie les produits demandées par leur categorie
            $categories = $entity->getRepository(Categorie::class)->findAll();
            for($ind = 0; $ind < count($categories); $ind++){
                $categorie = $categories[$ind];
                $categories[$ind] = [$categorie, array()];
                foreach($produitsDemande as $produitDemande){
                    if($produitDemande->getPrduitCategorie() == $categorie)
                        array_push($categories[$ind][1], $produitDemande);
                }
            }
            
            return $this->render('evenement/don.html.twig', [
                'evenement' => $evenement,
                'categories' => $categories,
            ]);
        }
        else{ //Date collecte n'est pas passé (On doit afficher formularie de demandes)
            if(!empty($_POST) && isset($_POST['produits'])){
                //Okay, the form od demande  is submitting
                if($user == null){
                    return $this->redirectToRoute('app_login');
                }

                $participation = $participation=$entity->getRepository(Participation::class)->findOneBy(['user'=>$user, 'evenement'=>$evenement]);
                if($participation != null)
                    return $this->redirectToRoute('app_users');
                
                $produitsIds = $_POST['produits'];
                $participation = new Participation();
                $participation->setEvenement($evenement);
                $participation->setUser($user);

                foreach($produitsIds as $produitId){
                    $produit = $produitEntity->find($produitId);
                    $exemplaire = new ProduitExemplary();
                    $exemplaire->setProduit($produit);
                    $produitGestion = new ProduitGestion();
                    $produitGestion->setParticipation($participation);
                    $produitGestion->setProduitExemplary($exemplaire);
                    
                    
                    $entity->persist($exemplaire);
                    $entity->persist($produitGestion);
                    $participation->addProduitGestion($produitGestion);
                }

                $entity->persist($participation);
                $entity->flush();

                return $this->redirectToRoute('app_users');
            }
            
            $categories = $entity->getRepository(Categorie::class)->findAll();

            return $this->render('evenement/demande.html.twig', [
                'evenement' => $evenement,
                'categories' => $categories,
            ]);
        }
    }

    //True if the $date is before today
    private function datePasse($date){
        return $date < new DateTime();
    }

    #[Route("/evenement/{id}/participation-delete", name: "participation_delete")]
    public function delete ($id, EntityManagerInterface $entity, ManagerRegistry $entityManager): Response{
        $user = $this->security->getUser();
        $evenement = $entity->getRepository(Evenement::class)->find($id);
        $participation=$entity->getRepository(Participation::class)->findOneBy(['user'=>$user, 'evenement'=>$evenement]);

        $entityManager=  $entityManager->getManager();
        $entityManager->remove($participation);
        $entityManager->flush();
        return $this->redirectToRoute('app_users');
    }
}
