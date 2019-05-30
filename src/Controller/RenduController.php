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

     /**
     * @Route("/rendu/reussirachat", name="reussite")
     */
    public function reussite1(){

        return $this->render('rendu/reussir.html.twig');
    }

     /**
     * @Route("/rendu/investissement", name="invest")
     */
    public function investissement(){

        return $this->render('rendu/invest.html.twig');
    }

     /**
     * @Route("/rendu/conseilachat", name="conseil")
     */
    public function conseil(){

        return $this->render('rendu/conseil.html.twig');
    }

    //  /**
    //  * @Route("/rendu/reussirachat", name="reussite")
    //  */
    // public function reussite4(){

    //     return $this->render('rendu/reussir.html.twig');
    // }

    //  /**
    //  * @Route("/rendu/reussirachat", name="reussite")
    //  */
    // public function reussite5(){

    //     return $this->render('rendu/reussir.html.twig');
    // }
}
