<?php
// Src/Controllers/Front.php


declare(strict_types=1);

namespace App\Controllers;

use App\Lib\Database;
use App\Models\User;
use App\Models\UserManager;
use App\Controllers\EmailController;

// Fonction 
function debug($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


class Front
{
    // Les erreurs

    // Pour afficher la page accout
    public function getAccountPage(){
        require "views/back/account.php";
    }

    // Pour afficher la page homepage
    public function getHomePage(){
        require "views/front/homepage.php";
    }
    
    // Pour afficher la page login
    public function getLoginPage(){
        // require "views/front/auth-login.php";
        require "views/front/auth-login.php";
    }

    // Pour afficher la page sign up 
    public function getRegisterPage(){

        // Enregistrer l'utilisateur
        if( 
            isset($_POST['firstname']) && !empty($_POST['firstname']) &&
            isset($_POST['lastname']) && !empty($_POST['lastname']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['password']) && !empty($_POST['password']) &&
            isset($_POST['repeatPassword']) && !empty($_POST['repeatPassword'])
        )
        {
            // les deux mots de passe doivent être identique
            if( $_POST['password'] === $_POST['repeatPassword'] )
            {
                $userData = new User([
                    'firstName' => $_POST['firstname'],
                    'lastName' => $_POST['lastname'],
                    'email' => $_POST['email'],
                    'password' => password_hash( $_POST['password'], PASSWORD_DEFAULT )
                ]);
                
                $userManager = new UserManager();
                $user_id = $userManager->getUserId( $userData->getEmail() );

                if( $userManager->getUserId( $userData->getEmail() ) )
                {
                    // Sinon on renvoi un message d'erreur
                    echo "Cet utilisateur existe déjà";

                }else {
                    
                    // Si $userManager->getUserId() returne 0, on enregistre le nouveau utilisateur
                    
                    // Vérifier la validité du mot de passe 
                    if ( preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/', $_POST['password']) ) {

                        // générer un token 
                        $token = bin2hex(random_bytes(32));

                        // compléter l'objet userData
                        $userData->setToken($token); 
                        $userData->setRole('subscriber'); 
                        $userData->setUserstatut(true);

                        // Créer l'utilisateur
                        $userManager->createUser($userData);                        
                        
                        // Envoyer un mail à l'utilisateur 
                        $host = $_SERVER['HTTP_HOST'];
                        $confirmationLink = sprintf('%s/index.php?action=confirmAccount&token=%s', $host, $token);
                        $username = $userData->getFirstname() . ' ' . $userData->getLastname();

                        $sendMail = new EmailController();
                        $sendMail->sendConfirmationEmail($username, $userData->getEmail(), $confirmationLink);


                        // Envoyer le message que le compte a bien été créé
                        
                        // Envoyer à la page de confirmation
                        
                        
                    } else {
                        echo "mot de passe minimum 8 caractères, un majuscule et un symbole spec.";
                    }
                }                

            } else {
                // message d'erreur 
                echo "Mot de passe non identique";
            }
            
        }else {
            // Remplire tout les champs
        }
        
        
        require "views/front/auth-register.php";
    }

    public function getTestPage()
    {
        require 'views/test.php';
    }
    // ------
    // Pour afficher la page de about
    
    
    
}