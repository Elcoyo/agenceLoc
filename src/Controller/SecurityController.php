<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class SecurityController extends AbstractController
{
    #[Route('/inscription', name: 'register')]
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $encoders): Response
    {
        $user= new User;

        $form= $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid());
        {
            $manager->persist($user);
            $manager->flush();

            // return $this->redirectToRoute('register');
        }
        return $this->render('security/register.html.twig', [
            'form'=> $form
        ]);
    }
}
