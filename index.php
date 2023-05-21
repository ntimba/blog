<?php
session_start();

// Database connecion
use App\Lib\DatabaseConnection;

// Front controllers
use App\Controllers\Frontend;
use App\Controllers\Backend;



require __DIR__ . '/vendor/autoload.php';



function debug($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


// $connection = new DatabaseConnection;



if( isset($_GET['action']) && $_GET['action'] !== '' ) {
    $frontend = new Frontend;
    $backend = new Backend;

    switch ($_GET['action']) {
        // Front
        case 'login':
            $frontend->getLogin();
            break;
        case 'register':
            $frontend->getRegister();
            break;
        case 'forgotpassword':
            $frontend->getForgotPassword();
            break;
        case 'about':
            $frontend->getAbout();
            break;

        case 'skills':
            $frontend->getSkills();
            break;
            
        case 'blog':
            $frontend->getBlog();
            break;
                
        case 'article':
            $frontend->getArticle();
            break;

        case 'portfolio':
            $frontend->getPortfolio();
            break;

        case 'contact':
            $frontend->getContact();
            break;
        case 'page':
            // Affichage des pages normal
        case 'page':
            $frontend->getPage();
            break;

        case 'verifyuser':
            // Ajouter afficher la page de confirmation de mail
            $frontend->verifyAccount();
            break;
            // Back
        case 'dashboard':
            $backend->getDashboard();
            break;
        case 'logout':
            $backend->getLogout();
            break;
        case 'createcategory':
            $backend->getCategories();
            break;
        case 'posts':
            $backend->getPosts();
            break;
        case 'addpost':
            $backend->getAddPost();
            break;
        case 'users':
            $backend->getUsers();
            break;
        case 'comments':
            $backend->getComments();
            break;
        case 'test':
            $backend->getTestPage();
            break;
        default:
            header('HTTP/1.0 404 Not Found');
            include("views/404.php");
            break;
    }    
} else {
    // Page d'accueil

    $frontend = new Frontend;
    $frontend->getAbout();

}
