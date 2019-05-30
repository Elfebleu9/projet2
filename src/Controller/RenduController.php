<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RenduController extends AbstractController
{
    /**
     * @Route("/rendu", name="rendu")
     */
    public function index()
    {
        return $this->render('rendu/index.html.twig', [
            'controller_name' => 'RenduController',
        ]);
    }

    /**
     * @Route("/rendu/reussirachat", name="reussite")
     */
    public function reussite(){

        return $this->render('rendu/reussir.html.twig');
    }
}
