<?php

namespace App\DataFixtures;

use Faker;
use Datetime;
use App\Entity\User;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        
        )
    {}
    public function load(ObjectManager $manager): void
    {   
       
    //    $admin= new User();
    //    $admin->setNom('nassima');
    //    $admin->setPrenom('guettas');
    //    $admin->setNumero('0752986321');
    //    $admin->setDatedeNaissance(new Datetime('26-05-1994'));
    //    $admin->setCivilite('femme');
    //    $admin->setEmail('nassima@gmail.com');
    //    $admin->setRoles(['ROLE_USER']);  
    //    $admin->setPassword(
    //     $this->passwordEncoder->hashPassword($admin,'test')
    //    );
    //    $admin->setCreatedAt(new DateTimeImmutable());
       

        $admin= new User();
       $admin->setNom('zaki');
       $admin->setPrenom('nacer');
       $admin->setNumero('0752986321');
       $admin->setDatedeNaissance(new Datetime('26-05-1994'));
       $admin->setCivilite('homme');
       $admin->setEmail('zaki@gmail.com');
       $admin->setRoles(['ROLE_ADMIN']);  
       $admin->setPassword(
        $this->passwordEncoder->hashPassword($admin,'test')
       );
       $admin->setCreatedAt(new DateTimeImmutable());
       
       $manager->persist($admin);

        // $faker= Faker\Factory::create('fr_FR'); 
        // for($usr=0 ; $usr<=5 ; $usr++){
        //         $user= new User();
        //         $user->setNom($faker->nom);
        //         $user->setPrenom($faker->prenom);
        //         $user->setNumero($faker->numero);
        //         $user->setDatedeNaissance($faker->DatedeNaissance);
        //         $user->setCivilite($faker->civilite);
        //         $user->setEmail($faker->email);
        //         $user->setRoles($faker->roles);
        //         $user->setPassword(
        //             $this->passwordEncoder->hashPassword($user,'secret')
        //             );
        //         $manager->persist($user);
        // }
        $manager->flush();
    }
}
