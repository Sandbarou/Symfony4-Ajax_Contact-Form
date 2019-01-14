<?php

namespace App\Controller;


use App\Entity\Client;
use Symfony\Component\Config\Definition\Exception\Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;



class EmailController extends AbstractController
{
    /**
     * @Route("/email/{email}", name="app_email")
     */

    public function Email(Request $request, $email)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $emailexistant = $em
                ->getRepository(Client::class)
                ->findOneBy(
                    array('email' => $email)
                );

            if ($emailexistant) {

                return $this->json(true);

            } else {

                return $this->json(false);

            }

        } else {
            throw new Exception('Erreur');
        }

    }
}

