<?php

namespace App\Controller;


use PDO;
use PDOException;
use App\Entity\Commcl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Loader\ArrayLoader;
use Twig_Environment;
use Twig\Loader\ChainLoader;
use Twig\Loader\FilesystemLoader;
use Twig\TemplateWrapper;


class Pjim1Controller extends AbstractController
{ 


     /**
     * @ORM\Column(type="string", length=255)
     */
    private $auteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contenu;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

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
         }
         
      

        @$auteur=$_POST['auteur'];
        @$contenu=$_POST['contenu'];
       
        $insertion=$connexion->prepare('INSERT INTO postspj1 (auteur,contenu) VALUES(?,?)');
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


           
            
            // $select= new Commcl();
            $select=$connexion->prepare('SELECT * FROM postspj1'); 
            $select->execute();
            $donnees=$select->fetchAll();

            $loader = new \Twig\Loader\FilesystemLoader('pjim1\commshwpost.html','templates');
            $twig = new \Twig\Environment($loader);

            echo $twig->render('commshwpost.html', ['donnees' => $donnees]);
            
            // var_dump($donnees);
            // foreach($donnees as $donnee):

            //     echo '<pre>laissé par :' . $donnee['auteur'] .' le ' . $donnee['date'] .' <br/>'. $donnee['contenu'].'</pre>';

            // endforeach;
            
            // $loader = new \Twig\Loader\ArrayLoader([
            //     'pjim1\commshwpost.html' => '{% block content %} Hello {{ name }}!{% endblock %}',
            // ]);
            
           
            // echo "<pre>";
            // print_r($donnees);
            // echo "<pre>";

            // <?php
            //    require_once 'vendor/twig/lib/Twig/autoload.php'; // Autoload files using Composer autoload

                // function get_halt_data() {
   
                //     return file_get_contents(__FILE__, false, null, __COMPILER_HALT_OFFSET__);
                // }
                //$twig1 = new TemplateWrapper();
                
               
               
            

                // $loader1 = new Arrayloader(array('pjim1\commshwpost.html.twig' => 'base4.html.twig'));
                // $loader2 = new Arrayloader(array('pjim1\commshwpost.html.twig' =>
                // '{% block content %}
                              
                        // {% for (donnee in donnees) %}

                        //     Laissé par : {{donnee.auteur}}  le {{donnee.date}} <br/> {{donnee.contenu}}<br/><br/>
                                                       
                        // {% endfor %}
                             
                //  {% endblock %}'));
                // var_dump($loader2);
                // $loader= new ChainLoader([$loader1,$loader2]);

                // $twig = new Twig_Environment($loader);
               
                

                // echo $twig->render('pjim1\commshwpost.html.twig',array('donnee'=>[$donnee]));

                
                 return $this->render('pjim1\commshwpost.html.twig',array('donnees'=>[$donnees]));

                }
                

                //  $loader = new \Twig\Loader\ArrayLoader([
                //     'pjim1\commshwpost.html.twig' => '{% block content %} Hello {{ name }}!{% endblock %}',
                // ]);
    //             $twig = new \Twig\Environment($loader);
                
    //             echo $twig->render('pjim1\commshwpost.html.twig', ['name' => 'Fabien']);
    //             return $this->render('pjim1\commshwpost.html.twig');
    // }
}
            // __halt_compiler();

