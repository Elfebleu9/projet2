
    <!DOCTYPE html>
    <html>
	<head>
	
		<title>Quoi de 9 ?</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" href="../Img/favicon 31 x 26 b.png" type="image/png" sizes="16x16">
        <link rel="manifest" href="/manifest.json">
		<link rel="stylesheet" href="style2.css" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	
	
	</head>
    <body>




        <h1 id="ce"> Commentaires</h1><br/>
        <div class="container">
             <div class="bodyshow">
                                Je ne veux pas fonctionner.
            <?php 
            
                $connexion=new PDO("mysql:host=localhost;dbname=pjim1","root","");
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND 
                        => 'SET NAMES utf8');	  
         
            if(isset($connexion)){
                echo 'Vous êtes connecté';
            }
            // catch(PDOException $e){ 
            //     echo 'Echec de la connexion:'.$e->getMessage(); 
            // } 

           
            $select= new Commcl();
            $select=$connexion->prepare('SELECT * FROM postspj1'); 
            $select->execute();
            $donnees=$select->fetchAll(); ?>

                     

                        <div class="comment">
                            <div class="row">
                                <div>                      
                                    <?php foreach ($donnees as $donnee):

                                        echo 'bonjour'.'  '.$donnee['auteur'];

                                        endforeach;
                                                                       
                                    ?>
                                                                      
                                </div>                            
                                
                            </div>
                        
                        </div>
                   
                  

       
    
   
               
             </div>   
        </div>      

    </body>

?>