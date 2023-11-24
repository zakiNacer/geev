<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class ProduitCrudController extends AbstractCrudController
{
    
    public static function getEntityFqcn(): string
    {
        return Produit::class;
        
    }



    
    public function configureFields(string $pageName): iterable
    {
        $objet=new Produit();
        
        return[
        TextField::new('nom_pdroduit')->setLabel('nom_pdroduit')->setRequired(true),
        SlugField::new('slug')->setTargetFieldName('nom_pdroduit'),
        TextareaField::new('description'),
        AssociationField::new('PrduitCategorie'),
        
        TextField::new('attachmentfile')->setFormType(VichImageType::class)->onlyWhenCreating(),
        ImageField::new('image')->setBasePath('/uploads/attachments')->onlyOnIndex(),
        
    ];
   
    }

    
}
