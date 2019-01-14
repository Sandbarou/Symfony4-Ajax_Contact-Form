<?php

namespace App\Controller;

use App\Entity\CpAutocomplete;
use Symfony\Component\Config\Definition\Exception\Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;


class VilleController extends AbstractController
{
    /**
     * @Route("/ville/{CP}", name="app_ville")
     */

    public function Ville(Request $request, $CP)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $villecodepostal = $em
                ->getRepository(CpAutocomplete::class)
                ->findBy(
                    array('CP' => $CP)
                );

            if ($villecodepostal) {
                $villes = array();
                foreach  ($villecodepostal as $ville) {
                    $villes[$ville->getVILLE()] = $ville->getVILLE();
                }
            } else {
                $villes = null;
            }
            return $this->json(array('ville' => $villes));

        } else {
            throw new Exception('Erreur');
        }

    }


}

