<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Form\CommentType;
use App\Entity\Commentaire;
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

        return $this->render('procedural.html.twig');
    }

     /**
     * @Route("/h1", name="home1")
     */
    public function home1(){
        return $this->render('pjim2/home1.html.twig');
    }

     /**
     * @Route("/h2", name="home2")
     */
    public function home2(){
        return $this->render('pjim2/home.html.twig');
    }

     /**
     * @Route("/renseignement", name="renseignt")
     */
    public function renseignt(){
        return $this->render('pjim2/renseignement.html.twig');
    }
     
     /**
     * @Route("/financement", name="financnt")
     */
    public function financnt(){
        return $this->render('pjim2/financement.html.twig');
    }

     /**
     * @Route("/recherche", name="recherche")
     */
    public function recherche(){
        return $this->render('pjim2/recherche.html.twig');
    }

     /**
     * @Route("/reservation", name="reserve")
     */
    public function reserve(){
        return $this->render('pjim2/reserve.html.twig');
    }

     /**
     * @Route("/recuperation", name="recup")
     */
    public function recup(){
        return $this->render('pjim2/recup.html.twig');
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
    public function show(Article $article, Request $request, ObjectManager $manager){

        $comment= new Commentaire;

        $form= $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $comment->setCreatedAt(new \DateTime())
                    ->setArticle($article);
            $manager->persist($comment);
            $manager->flush();

            return $this->redirectToRoute('pjim2_show',['id'=>$article->getId()]);
        }
       
        return $this->render('pjim2/show.html.twig', 
        [ 'article'=>$article,'commentForm'=>$form->createView()
        ]);
    }

     /**
     * @Route("/commentaires", name="comsit")
     */
    public function commentsite(){

        try{ 
            $connexion=new PDO("mysql:host=localhost;dbname=pjim2","root","");
              array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND 
                      => 'SET NAMES utf8');	  
         } 
         catch(PDOException $e){ 
            echo 'Echec de la connexion:'.$e->getMessage(); 
         } 

        return $this->render('pjim2/commsite.html.twig');
    }

    
    
}
