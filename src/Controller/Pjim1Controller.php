<?php

namespace App\Controller;


use PDO;
use PDOException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Pjim1Controller extends AbstractController
{
    /**
     * @Route("/pjim1", name="pjim1")
     */
    public function index()
    {
        return $this->render('pjim1/index.html.twig', [
            'controller_name' => 'Pjim1Controller',
        ]);
    }

     /**
     * @Route("/pjim1/posts", name="comsit")
     */
    public function commentsite(){

        try{ 
            $connexion=new PDO("mysql:host=localhost;dbname=pjim1","root","");
              array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND 
                      => 'SET NAMES utf8');	  
         } 
            catch(PDOException $e){ 
                echo 'Echec de la connexion:'.$e->getMessage(); 
                die();
            } 
    
            @$auteur=$_POST['auteur'];
            @$contenu=$_POST['contenu'];
    
            $insertion=$connexion->prepare('INSERT INTO commentaires (auteur,contenu) VALUES(?,?)');
    
            $insertion->execute(array($auteur,$contenu));
    
            
     

        return $this->render('pjim1/commsite.html.twig');
        

    }
            


    /**
     * @Route("/pjim1/shposts", name="shwcomm")
     */
    public function showcomm(){

        try{ 
            $connexion=new PDO("mysql:host=localhost;dbname=pjim1","root","");
              array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND 
                      => 'SET NAMES utf8');	  
         } 
         catch(PDOException $e){ 
            echo 'Echec de la connexion:'.$e->getMessage(); 
         } 
         

         $select=$connexion->query('SELECT * FROM commentaires');       

         var_dump($select);
        

        return $this->render('pjim1/commshwpost.html.twig');
    }

}
