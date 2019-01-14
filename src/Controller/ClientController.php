<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;



class ClientController extends AbstractController
{

    /**
     * @Route("/", name="app_hello")
     */

    public function hello()
    {

        return new Response('Hello World!');

    }

    /**
     * @Route("/form", name="app_form")
     */

    public function Formulaire(Request $request)
    {
        $session = new Session();
        $session->start();

        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            $session->getFlashBag()->add('notice', 'Vos données ont bien été enregistrées');

            return $this->redirectToRoute('app_form');
        }


        return $this->render('form/form.html.twig', array(
            'form' => $form->createView(),
        ));

    }


}

