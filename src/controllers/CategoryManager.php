<?php 

declare(strict_types=1);

class CategoryManager
{

    private Object $dbConnect;

    public function __construct($dbConnect)
    {
        // var_dump($dbConnect);
        $this->dbConnect = $dbConnect;
    }

    // Create a category 
    public function createCategory(Category $categoryData)
    {
        $query = $this->dbConnect->prepare('INSERT INTO category(category_name, category_slug, category_description, category_creation_date, category_id_parent) VALUES(:category_name, :category_slug, :category_description, NOW(), :category_id_parent)');
        $query->execute([
            'category_name' => $categoryData->getCategoryName(), 
            'category_slug' => $categoryData->getCategorySlug(), 
            'category_description' => $categoryData->getCategoryDescription(),
            'category_id_parent' => $categoryData->getCategoryParent()
        ]);   
    }

    // Get a category
    public function getCategory(Category $categoryData) : array
    {
        $query = $this->dbConnect->prepare('SELECT * FROM category WHERE category_id = ? ');
        $category = $query->execute([
            $categoryData->getId()
        ]);

        return $category;
    }

    // Get a category ID
    public function getCategoryId( $categoryName ) : array | bool
    {
        $query = $this->dbConnect->prepare('SELECT category_id FROM category WHERE category_name = :category_name ');
        $query->execute([
            'category_name' => $categoryName
        ]);

        $category = $query->fetch(PDO::FETCH_ASSOC);

        return $category;
    }

    // Get all categories
    public function getAllCategories() : array | bool
    {
        $query = $this->dbConnect->prepare('SELECT * FROM category');
        $query->execute();
        $categories = $query->fetchAll();

        return $categories;
    }

    // Update a category
    public function updateCategory(Category $categoryData) : void
    {
        $query = $this->dbConnect->prepare('UPDATE category SET category_name = :category_name, category_slug = :category_slug, category_description = :category_description, category_creation_date = :category_creation_date, category_id_parent = :category_id_parent');
        $updateCategory = $query->execute([
            'category_name' => $categoryData->getName(),
            'category_slug' => $categoryData->getSlug(),
            'category_description' => $categoryData->getDescription(),
            'category_creation_date' => $categoryData->getCreationdate(),
            'category_id_parent' => $categoryData->getParent()
        ]);
    }

    // Delete a category
    public function deleteCategory(Category $categoryData): void
    {
        $query = $this->dbConnect->prepare('DELETE FROM category WHERE category_id = :category_id');
        $query->execute([
            $categoryData->getId()
        ]);
    }    
}
    
    
