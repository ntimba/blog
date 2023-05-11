<?php
// Database connecion
use App\Lib\DatabaseConnection;

// Front controllers
use App\Controllers\Front;



require __DIR__ . '/vendor/autoload.php';



function debug($var){
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}


// $connection = new DatabaseConnection;



if( isset($_GET['action']) && $_GET['action'] !== '' ) {
    $front = new Front;

    switch ($_GET['action']) {
        case 'register':
            $front->getRegisterPage();
            break;
        case 'login':
            $front->getLoginPage();
            break;
        case 'account':
            $front->getAccountPage();
            break;
        case 'confirmAccount':
            // Ajouter afficher la page de confirmation de mail
            $front->getAccountPage();
            break;
        case 'test':
            $front->getTestPage();
            break;
        default:
            header('HTTP/1.0 404 Not Found');
            include("404.php");
            break;
    }    
} else {
    // Page d'accueil

    $front = new Front;
    $front->getHomePage();

}
