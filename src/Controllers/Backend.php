<?php
// Src/Controllers/Front.php

declare(strict_types=1);

namespace App\Controllers;

use App\Lib\Database;
use App\Models\User;
use App\Models\UserManager;

use App\Models\Post;
use App\Models\PostManager;

use App\Models\Category;
use App\Models\CategoryManager;

use App\Controllers\EmailController;

class Backend 
{   
    public function getDashboard()
    {
        if( !isset( $_SESSION['user_id'] ) ){
            header( 'Location: index.php' );
            exit();
        }

        require("./views/back/index.php");

    }

    public function getLogout()
    {
        if( !isset( $_SESSION['user_id'] ) ){
            header( 'Location: index.php' );
            exit();
        }
        // session_start();
        unset( $_SESSION['user_id'] );
        session_destroy();
        header('Location: index.php');
    }

    public function getPosts()
    {
        if( !isset( $_SESSION['user_id'] ) ){
            header( 'Location: index.php' );
            exit();
        }

        // lister toute les articles 
        $posts = new PostManager();
        
        $allPosts = $posts->getAllPosts();

        require("./views/back/articles.php");
    }
    
    public function getAddPost(){
        if( !isset( $_SESSION['user_id'] ) ){
            header( 'Location: index.php' );
            exit();
        }

        // permet de lister les catégories
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->getCategories();
        
        // vérifier les éléments du formualire 
        if(
            isset($_POST['postTitle']) && !empty($_POST['postTitle']) &&
            isset($_POST['postSlug']) && !empty($_POST['postSlug']) &&
            isset($_POST['categoryName']) && !empty($_POST['categoryName']) &&
            isset($_POST['postContent']) && !empty($_POST['postContent'])
        )
        {
            // Récupérer l'identifiant de la catégorie
            $postManager = new PostManager();
            $postId = $postManager->getPostId( $_POST['postTitle'] );

            // Récupérer l'identifiant de l'utilisateur
            $userId = $_SESSION['user_id'];

            // Récupérer l'identifiant de la catégorie
            $categoryId = $categoryManager->getCategoryId( $_POST['categoryName'] );

            $newPost = new Post();
            
            if( isset( $_FILES['featuredImage'] ) ){
                $file = $_FILES['featuredImage'];
                $destination = 'assets/uploads/';
                $link = $newPost->importImage( $file, $destination );
            }
            
            $newPost->setTitle( $_POST['postTitle'] );
            $newPost->setSlug( $_POST['postSlug'] );
            $newPost->setContent( $_POST['postContent'] );
            $newPost->setCategoryId( $categoryId );
            $newPost->setUserId( $userId );
            $newPost->setImage( $link );

            // Si l'article n'existe pas, on va le créer
            if(!$postId){
                $postManager->createPost( $newPost );
            }
        }
        require("./views/back/addpost.php");
    }

    public function getCategories()
    {
        if( !isset( $_SESSION['user_id'] ) ){
            header( 'Location: index.php' );
            exit();
        }

        // category manager
        $category = new CategoryManager();

        if( 
            isset($_POST['categoryName']) && !empty($_POST['categoryName']) &&
            isset($_POST['categorySlug']) && !empty($_POST['categorySlug']) &&
            isset($_POST['categoryDescription']) && !empty($_POST['categoryDescription']) &&
            isset($_POST['categoryParent']) && !empty($_POST['categoryParent']) 
        ){
            
            // récupérer l'identifiant de l'id du parent
            $idCategoryParent = $category->getCategoryId( $_POST['categoryParent'] );
            
            // Créer une catégorie par défaut
            $newCategory = new Category([
                'name' => $_POST['categoryName'],
                'slug' => $_POST['categorySlug'],
                'description' => $_POST['categoryDescription'],
                'idParent' => $idCategoryParent
            ]);


            if(!$category->getCategoryId($newCategory->getName()) )
            {
                // Créer la catégorie
                $category->createCategory( $newCategory );   
            }
        }
        
        // Création de la catégorie par défaut
        if( !$category->getCategoryId('défaut') ){

            $defaultCategory = new Category([
                'name' => 'défaut',
                'slug' => 'defaut',
                'description' => "La catégorie par défaut est utilisée lorsque aucune autre catégorie spécifique n'est assignée. Elle agit comme une catégorie générique ou de remplacement pour les éléments non classés.",
                'idParent' => NULL
            ]);

            $category->createCategory( $defaultCategory );
        }


        $categoryManager = new CategoryManager();
        $categories = $categoryManager->getCategories();

        require("./views/back/categories.php");
    }

    
    public function getUsers()
    {
        if( !isset( $_SESSION['user_id'] ) ){
            header( 'Location: index.php' );
            exit();
        }

        require("./views/back/users.php");
    }

    public function getComments()
    {
        if( !isset( $_SESSION['user_id'] ) ){
            header( 'Location: index.php' );
            exit();
        }

        // recupérer l'identifiant de l'article
        // recupérer l'identifiant de l'utilisateur 
        // Ajouter un commentaire
        
        

        require("./views/back/comments.php");
    }
    
    public function getTestPage()
    {
        if( !isset( $_SESSION['user_id'] ) ){
            header( 'Location: index.php' );
            exit();
        }

        require("./views/back/tables.php");
    }
}