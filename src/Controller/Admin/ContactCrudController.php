<?php

 namespace App\Controller\Admin;

use App\Entity\Contact;

 
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;





class ContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Contact::class;
    }
   
    public function configureCrud(Crud $crud): Crud
    {
    return $crud
       
    ->setEntityLabelInPlural('demandes des contacts') 
    ->setEntityLabelInSingular('demande de contact')
        ->setPageTitle("index", "GiveNcollect - Affichage des message")
        ->setPaginatorPageSize(10);
        // ->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig');
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('fullName')->setDisabled(true),
            TextField::new('emailUser')->setDisabled(true),
            TextareaField::new('message')->setDisabled(true)
                
                ->hideOnIndex(),
            DateTimeField::new('date')->hideOnForm()

                ->hideOnForm(),
               
           
        ];
    }
    
}
