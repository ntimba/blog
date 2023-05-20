<?php
// Src/Controllers/Front.php

declare(strict_types=1);

namespace App\Controllers;

use App\Lib\Database;
use App\Models\User;
use App\Models\UserManager;
use App\Controllers\EmailController;

// Fonction 
// function debug($var){
//     echo '<pre>';
//     var_dump($var);
//     echo '</pre>';
// }

// debug();

class Backend 
{   
    public function getDashboard()
    {
        if( !isset( $_SESSION['user_id'] ) ){
            header( 'Location: index.php' );
            exit();
        }

        require "./views/back/index.php";

    }

    public function getLogout()
    {
        // session_start();
        unset( $_SESSION['user_id'] );
        session_destroy();
        header('Location: index.php');
    }
    
    public function getArticles()
    {
        require "./views/back/articles.php";
    }
    
    public function getUsers()
    {
        require "./views/back/users.php";
    }

    public function getComments()
    {
        require "./views/back/comments.php";
    }
    
    public function getTestPage()
    {
        require "./views/back/tables.php";
    }
}