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
        require "./views/back/dashboard.php";
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