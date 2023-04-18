<?php

declare(strict_types=1);

class Category
{
    private int $idCategory;
    private string $categoryName;
    private string $categorySlug;
    private string $categoryDescription;
    private string $createdDate;
    private int | null $categoryParent;

    public function __construct(array $categoryData)
    {
        $this->hydrate($categoryData);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $attribut => $value) {
            $setters = 'set' . ucfirst($attribut);
            $this->$setters($value);
        }
    }

    // SETTERS
    
    public function setIdCategory(int $idCategory)
    {
        if(is_numeric($idCategory) && !empty($idCategory))
        {
            $this->idCategory = $idCategory;
        }
    }

    public function setCategoryName(string $categoryName)
    {
        if(is_string($categoryName) && !empty( $categoryName ))
        {
            $this->categoryName = $categoryName;
        }
    }

    public function setCategorySlug(string $categorySlug)
    {
        // Créer une fonction qui va supprimer les espaces
        if( is_string($categorySlug) && !empty( $categorySlug ) )
        {
            $categorySlug = str_replace(' ', '_', $categorySlug);
            $this->categorySlug = strtolower($categorySlug); 
        }
    }

    public function setCategoryDescription(string $categoryDescription)
    {
        if( is_string($categoryDescription) && !empty( $categoryDescription ))
        {
            $this->categoryDescription = $categoryDescription;
        }
    }

    public function setCreatedDate(string $createdDate)
    {
        if(is_string($createdDate) && !empty($createdDate))
        {
            $this->createdDate = $createdDate;
        }
    }

    public function setCategoryParent( $categoryParent)
    {
        if(is_numeric($categoryParent) || $categoryParent == NULL)
        {

            $this->categoryParent = $categoryParent;

        }
    }


    // GETTERS
    public function getIdCategory() : int
    {
        return $this->idCategory;
    }

    public function getCategoryName() : string
    {
        return $this->categoryName;
    }

    public function getCategorySlug() : string 
    {
        return $this->categorySlug;
    }

    public function getCategoryDescription() : string
    {
        return $this->categoryDescription;
    }

    public function getCreatedDate() : string
    {
        return $this->createdDate;
    }

    public function getCategoryParent() : int | null
    {
        return $this->categoryParent;
    }

}