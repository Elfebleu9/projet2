<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Commentaire;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker= \Faker\Factory::create('fr_FR');

        //Créer 3 catégories fakées
        for($i=1; $i<=3;$i++){
                $category = new Category();
                $category->setTitre($faker->sentence())
                         ->setDescription($faker->paragraph());

                $manager->persist($category);

                    //Créer entre 4 et 6 articles
                    for($j=1; $j<=mt_rand(4,6);$j++)
                        {
                                $article=new Article();

                                $content = '<p>'.($faker->text().'</p><p>').'</p>';
                             
                                $article->setTitre($faker->sentence())
                                        ->setContenu($content)
                                        ->setImage($faker->imageUrl())
                                        ->setCreatedAt($faker->dateTimeBetween('- 6 months'))
                                        ->setCategory($category);

                                $manager->persist($article);    
                                
                            //On donne des commentaires
                            
                            for ($k=1; $k<=mt_rand(4,10); $k++){
                                $comment=new Commentaire();
                                $content = '<p>'.($faker->text().'</p><p>').'</p>';

                                $days=(new\DateTime())->diff($article->getCreatedAt())->days;

                                $comment->setAuteur($faker->name)
                                        ->setContenu($content)
                                        ->setCreatedAt($faker->dateTimeBetween('-'.$days.'days'))
                                        ->setArticle($article);

                                $manager->persist($comment);
                            }

                        }


        
            }

        $manager->flush();
    }
}
