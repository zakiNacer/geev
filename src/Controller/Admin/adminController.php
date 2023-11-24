<?php

namespace App\Controller\Admin;

use App\Entity\Home;


use App\Entity\User;

use App\Entity\Contact;
use App\Entity\Produit;
use App\Entity\Categorie;
use App\Entity\Evenement;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class adminController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        
        return $this->render('admin/dashboard.html.twig');
        
    }
    public function linkToDashboardAction()
    {
    // Ajoutez le code que vous souhaitez exécuter lorsque l'utilisateur clique sur le lien "Dashboard"
    // Par exemple, vous pouvez rediriger l'utilisateur vers une page de tableau de bord personnalisée
    return $this->redirectToRoute('admin/contact.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('GiveNcollect- Administration')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fas fa-chart-bar');
        yield MenuItem::linkToCrud('Gestion du contenu page d\'accieul', 'fas fa-home', Home::class);
        yield MenuItem::linkToCrud('Gestion des utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Gestion des Evenements', 'fas fa-calendar-alt', Evenement::class);        
        yield MenuItem::linkToCrud('Gestion des Produits', 'fas fa-box', Produit::class);
        yield MenuItem::linkToCrud('Gestion des Catégories', 'fas fa-box', Categorie::class);
        yield MenuItem::linkToCrud('Contact', 'fa fa-envelope',Contact::class ); 
    }
}
