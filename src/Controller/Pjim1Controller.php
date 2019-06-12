<?php

namespace App\Controller;


use PDO;
use PDOException;
use App\Entity\Commcl;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
         
        //  $select= new Commcl();
         $select=$connexion->query('SELECT * FROM postspj1'); 
        
         while($donnees = $select->fetch()){
               
                    
                if(!empty($donnees)){

                    echo 'Laissé par '. $donnees['auteur'] . 'le' .$donnees['date'] . ':'
                    
                    .$donnees['contenu'] ;
                }                                                          
            }
        $select->closeCursor();

       
         
        return $this->render('pjim1/commshwpost.html.twig');
    }

}
