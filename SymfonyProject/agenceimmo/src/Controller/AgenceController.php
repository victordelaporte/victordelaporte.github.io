<?php

namespace App\Controller;

use App\Entity\Bien;
use App\Form\BienType;
use App\Entity\Contact;
use App\Entity\Famille;
use App\Form\ContactType;
use App\Notification\ContactNotification;
use App\Repository\BienRepository;
use App\Repository\FamilleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgenceController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function home(BienRepository $repo)
    {
        $biens = $repo->findBy(['type'=>true], ['createdAt' => 'DESC'], 12);

        return $this->render('agence/home.html.twig', [
            'controller_name' => 'AgenceController',
            'biens' => $biens
        ]);
    }

    /**
     * @Route("/ventes", name="ventes_show")
     */
    public function ventes_show(BienRepository $repo)
    {

        $biens_type = $repo->findBy(['isVisible'=>true, 'type'=>1], ['createdAt' => 'DESC']);

        return $this->render('agence/full_show.html.twig', [
            'controller_name' => 'AgenceController',
            'biens_type' => $biens_type

        ]);
    }

    /**
     * @Route("/locations", name="locations_show")
     */
    public function locations_show(BienRepository $repo)
    {
        $biens_type = $repo->findBy(['isVisible'=>true, 'type'=>2], ['createdAt' => 'DESC']);
        return $this->render('agence/full_show.html.twig', [
            'controller_name' => 'AgenceController',
            'biens_type' => $biens_type

        ]);
    }

    /**
     * @Route("/show/{reference}", name="bien_show")
     */
    public function show(Bien $bien, $reference)
    {
        return $this->render('agence/show.html.twig', [
            'controller_name' => 'AgenceController',
            'bien' => $bien
        ]);
    }

    /**
     * @Route("/bien/new",name = "bien_create")
     * @Route("/bien/{reference}/edit",name = "bien_edit")
     *
     * @param Bien $bien
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return void
     */
    public function form(Bien $bien = null, Request $request, EntityManagerInterface $em){

        if (!$bien){
            $bien = new Bien();
        }
        $form = $this->createForm(BienType::class, $bien);

        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){
            $em->persist($bien);
            $em->flush();
            return $this->redirectToRoute('bien_show', ['reference' => $bien->getReference()]);
        }
        return $this->render('agence/create.html.twig', [
            'formBien' => $form->createView(),
            'editMode' => $bien->getReference()!==null
        ]);

    }

    /**
     * @Route("/services", name="services")
     */
    public function services()
    {
        return $this->render('agence/services.html.twig', [
            'controller_name' => 'AgenceController',
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, ContactNotification $notifiaction)
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if($form->isSubmitted()&&$form->isValid()){
            $notifiaction->notify($contact);
            $this->addFlash('success', 'Votre email à bien été envoyé');
            return $this->redirectToRoute('contact');
        }

        return $this->render('agence/contact.html.twig', [
            'controller_name' => 'AgenceController',
            'formContact' => $form->createView()
        ]);
    }
  
}
