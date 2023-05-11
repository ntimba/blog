<?php

namespace App\Models;
use App\Lib\Database;
use PDO;

class UserManager
{    
    // Get User Id

    private Database $db;

    public function __construct(){
        $this->db = new Database();
    }

    // Get user ID
    public function getUserId( string $email ): int
    {
        $query = 'SELECT user_id FROM user WHERE user_email = :user_email';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->bindParam(":user_email", $email);
        $statement->execute();

        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['user_id'] ?? 0;
    }

    public function getUser( int $id ): array
    {
        // code
    }

    public function getAllUsers(): array
    {
        // code
    }

    public function createUser($newuser) : void
    {
        // code
        $query = 'INSERT INTO user(user_firstname, user_lastname, user_email, user_password, user_registration_date, user_role, user_token, user_profile_picture, user_biography, user_statut, user_audited_account) VALUES(:user_firstname, :user_lastname, :user_email, :user_password, NOW(), :user_role, :user_token, :user_profilepicture, :user_biography, :user_statut, :user_audited_account)';
        $statement = $this->db->getConnection()->prepare($query);
        $statement->execute([
            'user_firstname' => $newuser->getFirstname(),
            'user_lastname' => $newuser->getLastname(),
            'user_email' => $newuser->getEmail(),
            'user_password' => $newuser->getPassword(),
            'user_role' => $newuser->getRole(), 
            'user_token' => $newuser->getToken(),
            'user_profilepicture' => NULL,
            'user_biography' => NULL,
            'user_statut' => $newuser->getUserstatut(),
            'user_audited_account' => 0
        ]);
    }

    public function updateUser()
    {
        // code
    }

    public function deleteUser()
    {
        // code
    }

    public function handleError()
    {
        // code
    }

    public function filter()
    {
        // code
    }

    public function sort()
    {
        // code
    }



}
