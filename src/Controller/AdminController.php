<?php

namespace App\Controller;

use App\Entity\Vehicule;
use App\Form\VehiculeType;
use App\Repository\VehiculeRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// #[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    #[Route('/vehicule/ajout', name:'ajout_voiture')]
    public function formvoiture(Request $request, EntityManagerInterface $manager)
    {
        $vehicule = new Vehicule;

        $form = $this->createForm(VehiculeType::class, $vehicule );
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $vehicule->setDateEnregistrement(new \DateTime());
            $manager->persist($vehicule);
            $manager->flush();

            return $this->redirectToRoute('ajout_voiture');
        }
        
        return $this->render('admin/admin.html.twig', [
            'form' => $form
        ]);
    }

    #[Route('/vehicule/tableau/', name:'tableau_vehicule')]
    public function table(VehiculeRepository $repo,){
        $vehicules=$repo->findAll();
        return $this->render('admin/gestion.html.twig', [
            'vehicules' => $vehicules
        ]);
    }
    #[Route('/vehicule/edit/{id}', name:'edit_vehicule')]
    public function edit(Request $request, EntityManagerInterface $manager, Vehicule $vehicule){
       
        $form= $this->createForm(VehiculeType::class, $vehicule);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $vehicule= $form->getData();
            $manager->persist($vehicule);
            $manager->flush();
            
            return $this->redirectToRoute('tableau_vehicule');
        };
        
        return  $this->render('/admin/edit.html.twig', [
            'form' => $form
        ]);

    }

    #[Route('/vehicule/delete/{id}', name:'delete_vehicule')]
    public function delete(EntityManagerInterface $manager, Vehicule $vehicule){

        $manager->remove($vehicule);
        $manager->flush();
        return $this->redirectToRoute('tableau_vehicule');
    }

}
