<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EvenementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Evenement::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom')->setLabel('nom')->setRequired(true),
            SlugField::new('slug')->setTargetFieldName('nom'),
            DateTimeField::new('date_eevenement')->setLabel('date_eevenement')->setRequired(true),
            DateTimeField::new('date_collect')->setLabel('date_collect')->setRequired(true),
            TextField::new('lieu_evenement')->setLabel('lieu_evenement')->setRequired(true),
            TextareaField::new('detail_lieu')->setLabel('detail_lieu')->setRequired(true),
            TextareaField::new('description')->setLabel('description')->setRequired(true),  
            
        ];
    }
    
}
