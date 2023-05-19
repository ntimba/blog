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


class Frontend
{    
    public function getVerifyAccount()
    {
        require "./views/front/verify.php";
    }
    
    public function getForgotPassword()
    {
        require "./views/front/forgotpassword.php";
    }
    
    public function getAbout()
    {
        require "./views/front/about.php";
    }

    public function getSkills()
    {
        require "./views/front/skills.php";
    }

    public function getBlog()
    {
        require "./views/front/blog.php";
    }

    public function getPortfolio()
    {
        require "./views/front/portfolio.php";
    }

    public function getContact()
    {
        require "./views/front/contact.php";
    }

    public function getPage()
    {
        require "./views/front/page.php";
    }

    // Pour afficher la page accout
    public function getAccountPage(){
        require "views/back/account.php";
    }
    
    // To display the login page
    public function getLogin(){
        require "views/front/login.php";
    }

    // To display the sign up page
    public function getRegister(){

        // To register the user
        if( 
            isset($_POST['firstname']) && !empty($_POST['firstname']) &&
            isset($_POST['lastname']) && !empty($_POST['lastname']) &&
            isset($_POST['email']) && !empty($_POST['email']) &&
            isset($_POST['password']) && !empty($_POST['password']) &&
            isset($_POST['repeatPassword']) && !empty($_POST['repeatPassword'])
        )
        {
            // Accept the terms of use before registering
            if(isset( $_POST['terms'] )){

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
                        $error[] = "Cet utilisateur existe déjà";
    
                    }else {
                        // To check the validity of the password
                        if ( preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/', $_POST['password']) ) {
                            // To generate a token
                            $token = bin2hex(random_bytes(32));

                            $userData->setToken($token); 
                            $userData->setRole('subscriber'); 
                            $userData->setProfilePicture('../../assets/img/avatar.png');
                            $userData->setStatut(true);

                            $userManager->createUser($userData);                        
    
                            // Retrieve the user ID that was just created
                            $userId = $userManager->getUserId( $userData->getEmail() );
                            
                            // To send an email to the user
                            $host = $_SERVER['HTTP_HOST'];
                            $confirmationLink = sprintf('%s/index.php?action=verifyuser&token=%s&id=%s', $host, $token, $userId);
                            $username = $userData->getFirstname() . ' ' . $userData->getLastname();
    
                            $sendMail = new EmailController();
                            $sendMail->sendConfirmationEmail($username, $userData->getEmail(), $confirmationLink);
    
                            $message[] = "Votre compte a bien été créé";
                            
                            header('Location: index.php?action=verifyuser');
                            
                        } else {
                            $error[] = "mot de passe minimum 8 caractères, un majuscule et un symbole spec.";
                        }
                    }                
    
                } else {
                    $error[] = "Mot de passe non identique";
                }
            }else{
                $error[] = "Accepter nos conditions";
            }   
        }
        
        require "views/front/register.php";
    }


    public function getArticle(){
        require "views/front/article.php";
    }
    

    public function verifyAccount()
    {
        $userManager = new UserManager();

        if( isset($_GET['token']) && !empty($_GET['token']) && isset($_GET['id']) && !empty($_GET['id']))
        {
            $urlToken = $_GET['token'];
            $urlUserId = (int) $_GET['id'];

            $userData = $userManager->getUser( $urlUserId );
            
            if($userData){
                $userData->setToken(null);
                $userData->setAuditedaccount(true);

                // To update the user in the database
                $userManager = new UserManager();
                $userManager->updateUser( $userData );

                header('Location: index.php?action=login');
                
            }else{
                $error[] = "Cet utilisateur n'existe pas";
            }  
        } else {
            $error[] = "Une erreur s'est produite, vous pouvez créer un nouveau compte";
            header('Location: index.php');
        }
        require "views/front/verifyuser.php";
    }

    public function getTestPage()
    {
        require 'views/test.php';
    } 
}