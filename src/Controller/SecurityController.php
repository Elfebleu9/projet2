<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ConnexFormType;
use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{

    /**
     * @Route("/inscription", name="security_registration")
     */
   Public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
   {

        $user = new User ();
        $form=$this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $hash= $encoder->encodePassword( $user ,$user->getPassword());
            $user->setPassword($hash);
            
            $manager->persist($user);
            $manager->flush();

           

            return $this->redirectToRoute('app_login');
        }

        return $this->render('security/registration.html.twig',[
            'form'=>$form->createView()]);

    }
  
        /**
         * @Route("/login", name="app_login")
         */
        public function login(AuthenticationUtils $authenticationUtils): Response
        {
            // Pour l'erreur de login s'il y en a une
            $error = $authenticationUtils->getLastAuthenticationError();
            // email entré par l'utilisateur
            $email = $authenticationUtils->getLastUsername();

            return $this->render('security/login.html.twig', ['Email' => $email, 'error' => $error]);
        }

          /**
         * @Route("/deconnexion", name="security_logout")
         */
        public function logout(){}



    
    
}
