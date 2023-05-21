<?php

namespace App\Models;
use App\Lib\Database;
use PDO;

class PostManager
{    
    // Get User Id

    private Database $db;

    public function __construct(){
        $this->db = new Database();
    }

    // Get user ID
    public function getPostId( string $title ): int
    {
        $query = 'SELECT id FROM article WHERE title = :title';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->bindParam(":title", $title);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['id'] ?? 0;
    }

    public function getPost( int $id ): mixed
    {
        // echo $id;
        $query = 'SELECT id, title, content, creationDate, updateDate, slug, categoryId, userId, image WHERE id = :id';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->execute([
            'id' => $id
        ]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ( $result === false ) {
            return false;
        }
        
        $post = new Post();
        $user->hydrate( $result );
        return $user;

    }

    public function getAllPosts()
    {
        $query = 'SELECT id, title, content, creationDate, updateDate, slug, categoryId, userId, image FROM article';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->execute();

        $postsData = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ( $postsData === false ) {
            return false;
        }

        $categories = [];

        foreach( $postsData as $postData ){
            $post = new Post($postData);
            $posts[] = $post;
        }
        return $posts;   
    }
    
    
    
    


    public function createPost($newpost) : void
    {
        // code
        $query = 'INSERT INTO article(title, content, creationDate, updateDate, slug, categoryId, userId, image) 
                  VALUES(:title, :content, NOW(), :updateDate, :slug, :categoryId, :userId, :image)';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->execute([
            'title' => $newpost->getTitle(),
            'content' => $newpost->getContent(),
            'updateDate' => NULL,
            'slug' => $newpost->getSlug(), 
            'categoryId' => $newpost->getCategoryId(),
            'userId' => $newpost->getUserId(),
            'image' => $newpost->getImage()
        ]);
    }

    public function updatePost(Post $post)
    {
        $query = 'UPDATE  SET title = :title, content = :content, creationDate = :creationDate, updateDate = :updateDate, slug = :slug, categoryId = :categoryId, userId = :userId, image = :image WHERE id = :id';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->execute([
            'id' => $newpost->getId(),
            'title' => $newpost->getTitle(),
            'content' => $newpost->getContent(),
            'creationDate' => $newpost->getCreationDate(),
            'updateDate' => $newpost->getUpdateDate(),
            'slug' => $newpost->getSlug(), 
            'categoryId' => $newpost->getCategoryId(),
            'userId' => $newpost->getUserId(),
            'image' => $newpost->getImage()
        ]);
    }

    public function deletePost( int $id )
    {
        $query = 'DELETE FROM article WHERE id = :id';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->execute([
            'id' => $id
        ]);
    }    
}
