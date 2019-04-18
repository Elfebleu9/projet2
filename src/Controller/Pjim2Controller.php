<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Pjim2Controller extends AbstractController
{
    /**
     * @Route("/pjim2", name="pjim2")
     */
    public function index()
    {
        return $this->render('pjim2/index.html.twig', [
            'controller_name' => 'Pjim2Controller',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(){

        return $this->render('pjim2/home.html.twig');
    }

    /**
     * @Route("/pjim2/12", name="pjim2_show")
     */
    public function show(){

        return $this->render('pjim2/show.html.twig');
    }
}
