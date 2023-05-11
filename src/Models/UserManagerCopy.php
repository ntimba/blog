<?php

namespace App\Models;

// use App\Lib\DatabaseConnection;


class UserManagerCopy
{
    private $db_connect;

    // public DatabaseConnection $connection;

    public function __construct(PDO $db_connect)
    {
        $this->db_connect = $db_connect;
    } 

    
    // Get User Id
    public function getUserId( $email ): ?int
    {
        $query = 'SELECT user_id FROM user WHERE user_email = :user_email';
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([
            'user_email' => $email
        ]);

        $userId = $statement->fetch(PDO::FETCH_ASSOC);

        return $userId;

    }


    // Read
    // public function getUserId(User $userData)
    // {
    //     $sqlQuery = 'SELECT user_id FROM user WHERE user_email = :user_email';
    //     $getUserId = $this->connection->prepare($sqlQuery);
    //     $getUserId->execute([
    //         'user_email' => $userData->getEmail()
    //     ]);

    //     $userId = $getUserId->fetch();

    //     return $userId;
    // }
    
    
    
    public function userCreation(User $newuser) : void
    {   
        $sqlQuery = 'INSERT INTO user(user_firstname, user_lastname, user_email, user_password, user_registration_date, user_role, user_token, user_profile_picture, user_biography, user_statut, user_audited_account) VALUES(:user_firstname, :user_lastname, :user_email, :user_password, NOW(), :user_role, :user_token, :user_profilepicture, :user_biography, :user_statut, :user_audited_account)';
        $insertUser = $this->db_connect->prepare($sqlQuery);
        $insertUser->execute([
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





    public function getUserIdFromToken(User $userData) : array | bool
    {
        $sqlQuery = 'SELECT user_id FROM user WHERE user_token = :user_token';
        $getUserId = $this->db_connect->prepare($sqlQuery);
        $getUserId->execute([
            'user_token' => $userData->getToken()
        ]);
        
        $userId = $getUserId->fetch();
        
        return $userId;
    }
    
    public function getUserData(User $userData) : array
    {
        $sqlQuery = 'SELECT firstname, lastname, email, role, profilepicture, biography FROM user WHERE user_id = :user_id';
        $getUserData = $this->db_connect->prepare($sqlQuery);
        $getUserData->execute([
            'user_id' => $userData->getId()
        ]);

        $userData = $getUserId->fetchAll();

        return $userData;
    }

    public function getUserPassword(User $userData) : array
    {
        $sqlQuery = 'SELECT user_password FROM user WHERE user_id = :user_id';
        $getUserPass = $this->db_connect->prepare($sqlQuery);
        $getUserPass->execute([
            'user_id' => $userData->getId()
        ]);

        $userPass = $getUserPass->fetch();
        return $userPass; 

    } 

    public function getTokenFromDB($userData)
    {
        $sqlQuery = 'SELECT user_token FROM user WHERE user_token = :user_token';
        $getUserToken = $this->db_connect->prepare($sqlQuery);
        $getUserToken->execute([
            'user_token' => $userData->getToken()
        ]);

        $userToken = $getUserToken->fetch();

        return $userToken; 
    }

    public function getAuditedAccount(User $userData)
    {
        $sqlQuery = 'SELECT user_audited_account FROM user WHERE user_id = :user_id';
        $getAuditedAccount = $this->db_connect->prepare($sqlQuery);
        $getAuditedAccount->execute([
            'user_id' => $userData->getId()
        ]);

        $auditedAccount = $getAuditedAccount->fetch();

        return $auditedAccount;
    }


    // Update
    
    public function updateUser(User $userData) : void
    {
        $sqlQuery = 'UPDATE user SET user_firstname = :user_firstname, user_lastname = :user_lastname, user_email = :user_email, user_password = :user_password, user_registrationdate = NOW(), user_role = :user_role, user_profilepicture = :user_profilepicture, user_biography = :user_biography WHERE user_id = :user_id';
        $insertUser = $this->db_connect->prepare($sqlQuery);
        $insertUser->execute([
            'user_firstname' => $userData->getFirstname(),
            'user_lastname' => $userData->getLastname(),
            'user_email' => $userData->getEmail(),
            'user_password' => $userData->getPassword(),
            'user_role' => $userData->getRole(), 
            'user_profilepicture' => $userData->getProfilepicture(),
            'user_biography' => $userData->getBiography(),
            'user_id' => $userData->getUserId()
        ]);
    }

    public function updateTokenFromDB(User $userData) : void
    {
        $sqlQuery = 'UPDATE user SET user_token = :user_token WHERE user_id = :user_id';
        $insertUser = $this->db_connect->prepare($sqlQuery);
        $insertUser->execute([
            'user_token' => $userData->getToken(),
            'user_id' => $userData->getId()
        ]);        
    }

    public function updateAuditedAccount(User $userData) : void
    {
        $sqlQuery = 'UPDATE user SET user_audited_account = :user_audited_account WHERE user_id = :user_id';
        $insertUser = $this->db_connect->prepare($sqlQuery);
        $insertUser->execute([
            'user_audited_account' => $userData->getAuditedaccount(),
            'user_id' => $userData->getId()
        ]);
    }

    // Delete
    
    public function deleteUser(User $userData) : void
    {
        $sqlQuery = 'UPDATE user SET user_firstname = :user_firstname, user_lastname = :user_lastname, user_email = :user_email, user_password = :user_password, user_registrationdate = NOW(), user_role = :user_role, user_profilepicture = :user_profilepicture, user_biography = :user_biography, WHERE user_id = :user_id';
        $insertUser = $this->db_connect->prepare($sqlQuery);
        $insertUser->execute([
            'user_firstname' => $userData->getFirstname(),
            'user_lastname' => $userData->getLastname(),
            'user_email' => $userData->getEmail(),
            'user_password' => $userData->getPassword(),
            'user_role' => $userData->getRole(), 
            'user_profilepicture' => $userData->getProfilepicture(),
            'user_biography' => $userData->getBiography(),
            'user_id' => $userData->getUserId()
        ]);   
    }    
    
}
