<?php
 
namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
 
use App\Entity\Proveidor;
use App\Form\ProveidorType;
 
class ProveidorsController extends AbstractController
{
    public function index(Request $request, PersistenceManagerRegistry $doctrine): Response
    {
        
        // Extraiem tots els proveïdors
        $proveidorsRepo = $doctrine->getRepository(Proveidor::class);
        $proveidors = $proveidorsRepo->findAll();
 
        // Retorn de la vista
        return $this->render('proveidors/index.html.twig', [
            'proveidors' => $proveidors
        ]);
    }
 
    public function create(PersistenceManagerRegistry $doctrine, Request $request): Response{
        $entityManager = $doctrine->getManager();
        $proveidor = new Proveidor();
        $form = $this->createForm(ProveidorType::class, $proveidor);
        $form->handleRequest($request);
 
        if($form->isSubmitted() && $form->isValid()){
            $proveidor->setCreateAt(new \Datetime('now'));
            $proveidor->setEditedAt(new \Datetime('now'));
 
            $entityManager->persist($proveidor);
            $entityManager->flush();
 
            return $this->redirectToRoute('index');
        }
 
        return $this->render('proveidors/create.html.twig', [
            'form' => $form->createView()
        ]);
 
    }
 
    public function delete(Proveidor $proveidor, PersistenceManagerRegistry $doctrine): Response{
 
        if(!$proveidor){
            return $this->redirectToPath('index');
        }
 
        $entityManager = $doctrine->getManager();
 
        $entityManager->remove($proveidor);
        $entityManager->flush();
 
        return $this->redirectToRoute('index');
 
    }
 
    public function edit(Request $request, Proveidor $proveidor, PersistenceManagerRegistry $doctrine): Response{
        
        if(!$proveidor){
            return $this->redirectToPath('index');
        }

        $entityManager = $doctrine->getManager(); 
 
        $form = $this->createForm(ProveidorType::class, $proveidor);
        $form->handleRequest($request);
 
        if ($form->isSubmitted() && $form->isValid()) {
 
            $proveidor->setEditedAt(new \Datetime('now'));
 
            $entityManager->persist($proveidor);
            $entityManager->flush(); 
            
            return $this->redirectToRoute('index'); 
        }
 
        return $this->render('proveidors/edit.html.twig', [
            'proveidor' => $proveidor,
            'form' => $form->createView()
        ]);
    }
}