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

     /**
     * @Route("/rendu/simulation", name="simule")
     */
    public function simulation(){

        return $this->render('rendu/simule.html.twig');
    }

     /**
     * @Route("/rendu/tauxzero", name="taux")
     */
    public function tauxzero(){

        return $this->render('rendu/taux.html.twig');
    }

     /**
     * @Route("/rendu/deroulement", name="deroul")
     */
    public function deroul(){

        return $this->render('rendu/deroult.html.twig');
    }

     /**
     * @Route("/rendu/aides", name="aides")
     */
    public function aides(){

        return $this->render('rendu/aides.html.twig');
    }

      /**
     * @Route("/rendu/passage", name="passage")
     */
    public function passage(){

        return $this->render('rendu/passage.html.twig');
    }

      /**
     * @Route("/rendu/guide", name="guide")
     */
    public function guide(){

        return $this->render('rendu/guide.html.twig');
    }

      /**
     * @Route("/rendu/maitrise", name="etape")
     */
    public function maitrise(){

        return $this->render('rendu/etape.html.twig');
    }

      /**
     * @Route("/rendu/lecture", name="plan")
     */
    public function lireplan(){

        return $this->render('rendu/lireplan.html.twig');
    }

      /**
     * @Route("/rendu/comprehension", name="7cles")
     */
    public function comprehension(){

        return $this->render('rendu/7cles.html.twig');
    }

      /**
     * @Route("/rendu/verification", name="5points")
     */
    public function verif(){

        return $this->render('rendu/verif.html.twig');
    }

      /**
     * @Route("/rendu/nextreserve", name="next")
     */
    public function nextres(){

        return $this->render('rendu/next.html.twig');
    }

      /**
     * @Route("/rendu/remisecles", name="cles")
     */
    public function remise(){

        return $this->render('rendu/remise.html.twig');
    }

      /**
     * @Route("/rendu/garanties", name="garant")
     */
    public function garant(){

        return $this->render('rendu/garanties.html.twig');
    }

      /**
     * @Route("/rendu/checklist", name="check")
     */
    public function checklist(){

        return $this->render('rendu/check.html.twig');
    }

      /**
     * @Route("/rendu/astuces", name="astuces")
     */
    public function astuces(){

        return $this->render('rendu/astuces.html.twig');
    }
}
