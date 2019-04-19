<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class Pjim2Controller extends AbstractController
{
    /**
     * @Route("/pjim2", name="pjim2")
     */
    public function index(ArticleRepository $repo)
    {
       
        $articles=$repo->findAll();


        return $this->render('pjim2/index.html.twig', [
            'controller_name' => 'Pjim2Controller','articles'=>$articles
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(){

        return $this->render('pjim2/home.html.twig');
    }

    /**
     * @Route("/pjim2/{id}", name="pjim2_show")
     */
    public function show(Article $article){
       
            return $this->render('pjim2/show.html.twig', [ 'article'=>$article]);
    }
}
