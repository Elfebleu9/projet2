<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    * @Route("/pjim2/new", name="pjim2_create")
    * @Route("/pjim2/{id}/edit", name="pjim2_edit")
    */
    public function form(Article $article=null,Request $request,ObjectManager $manager){

        if(!$article){
            $article= new article();}


           $form=$this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            if(!$article->getId()){
            $article->setCreatedAt(new \Datetime());
        }

            $manager->persist($article);
            $manager->flush();

        return $this->redirectToRoute('pjim2_show',['id'=>$article->getId()]);
        }

        return $this->render('pjim2/create.html.twig',[
            'formArticle'=>$form->createView(),
            'editMode'=>$article->getId()!== null]);
    }

    /**
     * @Route("/pjim2/{id}", name="pjim2_show")
     */
    public function show(Article $article){
       
        return $this->render('pjim2/show.html.twig', [ 'article'=>$article]);
    }

    
    
}
