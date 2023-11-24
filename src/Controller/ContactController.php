<?php

namespace App\Controller;

use DateTime;
use DateTimeIterface;
use DateTimeImmutable;
use DateTimeInterface;
use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/message', name: 'app_message')]
    public function addMessage(Request $request, EntityManagerInterface $entity){
        if(isset($_POST['nome']) && isset($_POST['emailAddress']) && isset($_POST['message'])){
            // dd($_POST);
            $nom = $_POST['nome'];
            $email = $_POST['emailAddress'];
            $message = $_POST['message'];
            $date= \DateTimeImmutable::createFromMutable(new DateTime());
           
            $messages= new Contact();
            $messages->setFullName($nom);
            $messages->setEmailUser($email);
            $messages->setMessage($message);
            $messages->setDate($date);
            $entity->persist($messages);
            $entity->flush();

        }
        return $this->render('contact/message.html.twig');
        
    }
    
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
       
        return $this->render('contact/index.html.twig');
    }
}
