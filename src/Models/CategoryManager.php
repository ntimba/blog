<?php

namespace App\Models;
use App\Lib\Database;
use PDO;

class CategoryManager
{    
    // Get User Id

    private Database $db;

    public function __construct(){
        $this->db = new Database();
    }

    // Get user ID
    public function getCategoryId( string $name ): int
    {
        $query = 'SELECT id FROM category WHERE name = :name';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->bindParam(":name", $name);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['id'] ?? 0;
    }

    public function getCategory( int $id ): mixed
    {
        $query = 'SELECT id, name, slug, description, creationDate, idParent FROM category WHERE id = :id';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->execute([
            'id' => $id
        ]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ( $result === false ) {
            return false;
        }
        
        $category = new Category();
        $category->hydrate( $result );
        return $category;

    }

    public function getCategories()
    {
        $query = 'SELECT id, name, slug, description, creationDate, idParent FROM category';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->execute();

        $categoriesData = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ( $categoriesData === false ) {
            return false;
        }

        $categories = [];

        foreach( $categoriesData as $categoryData ){
            $category = new Category($categoryData);
            $categories[] = $category;
        }

        return $categories;
        
    }

    public function createCategory($newCategory) : void
    {
        // code
        $query = 'INSERT INTO category(name, slug, description, creationDate, idParent) 
                  VALUES(:name, :slug, :description, NOW(), :idParent)';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->execute([
            'name' => $newCategory->getName(),
            'slug' => $newCategory->getSlug(),
            'description' => $newCategory->getDescription(),
            'idParent' => $newCategory->getIdParent(),
        ]);
    }

    public function updateCategory(Category $category)
    {
        $query = 'UPDATE category SET name = :name, slug = :slug, description = :description, creationDate = :creationDate, idParent = :idParent';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->execute([
            'id' => $category->getId(),
            'name' => $category->getName(),
            'slug' => $category->getSlug(),
            'description' => $category->getDescription(),
            'creationDate' => $category->getCreationDate(),
            'idParent' => $category->getIdParent(),
        ]);
    }

    public function deleteCategory( int $id )
    {
        $query = 'DELETE FROM article WHERE id = :id';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->execute([
            'id' => $id
        ]);
    }

}
