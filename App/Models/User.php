<?php

namespace App\Models;

use PDO;
use \App\Token;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{
    /**
     * Error messages
     *
     * @var array
     */
    public $errors = [];

    /**
     * Creation date
     *
     * @var string
     */
    public $date;

    /**
     * User permission level
     *
     * @var string
     */
    public $permisson_level = 'primary_user';


    /**
     * Class contructor
     *
     * @param array $data Initial property values
     *
     * @return void
     */
    public function __construct($data = [])
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        };
    }

    /**
     * Save the user model with the current property values
     *
     * @return void
     */

    public function save()
    {
        $this->validate();

        if (empty($this->errors)) {
            $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

            date_default_timezone_set('America/Sao_Paulo');
            $t = time();
            $this-> date = $t; 

            $sql = 'INSERT INTO account (email,password_hash,permisson_level,creation_date) 
                    VALUES (:email, :password_hash, :permisson_level, :creation_date)';

            $db = static::getDB();
            $stmt = $db->prepare($sql);

            $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
            $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);
            $stmt->bindValue(':permisson_level', $this-> permisson_level, PDO::PARAM_STR);
            $stmt->bindValue(':creation_date', $this-> date, PDO::PARAM_STR);

            return $stmt->execute();
        }

        return false;
    }

    /**
     * Validate current property values, adding validation error messages to the errors array property
     *
     * @return void
     */

    public function validate()
    {

        // Email address
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[] = 'Invalid email';
        }
        if (static::emailExists($this->email)) {
            $this->errors[] = 'email already taken';
        }

        //Password

        if (strlen($this->password) < 6) {
            $this->errors[] = 'Password needs at least one letter';
        }

        if (preg_match('/.*[a-z]+.*/i', $this-> password) == 0) {
            $this->errors[] = 'Password needs at least one letter';
        }
        if (preg_match('/.*\d+.*/i', $this-> password) == 0) {
            $this->errors[] = 'Password needs at least one number';
        }
    }

    /**
     * See if a user record already exists with the specified email
     *
     * @param string
     *
     * @return boolean
     */

    public static function emailExists($email)
    {
        return static::findByEmail($email) !== false;
    }

    /**
     * Find a user model by email adress
     * 
     * @param string 
     * 
     * @return mixed
     */

     public static function findByEmail($email)
     {
        $sql = 'SELECT * FROM account WHERE email = :email';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $stmt->execute();

        return $stmt->fetch();
     }

    /**
     * Authenticate a user by email and password
     * 
     * @param string
     * @param string
     * 
     * @return mixed
     */
    public static function authenticate($email, $password)
    {
        $user = static::findByEmail($email);

        if ($user) {
           if (password_verify($password, $user->password_hash)) {
                return $user;
           }
           
        }
        return false;
    }

    /**
     * Find a user model by ID
     * 
     * @param string $id The user Id
     * 
     * @return mixed User object
     */
     public static function findByID($id)
     {
        $sql = 'SELECT * FROM account WHERE  id = :id';

        $db = static::getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());

        $stmt->execute();

        return $stmt->fetch();
     }
     /**
      * Remember the login by inserting a new unique token into the remembered_logins table
      * for this user record
      *
      * @return boolean 
      */
      public function rememberLogin()
      {
        $token = new Token();
        $hashed_token = $token->getHash();
        $this->remember_token = $token->getValue();

        date_default_timezone_set('America/Sao_Paulo');
        $this->expiry_timestamp = time() + 60 * 60 * 24 * 30; // 30 days from now

        $sql = 'INSERT INTO remembered_logins (token_hash, user_id, expires_at) VALUES (:token_hash, :user_id, :expires_at)';

        $db = static::getDB();
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':token_hash', $hashed_token, PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $this->id, PDO::PARAM_INT);
        $stmt->bindValue(':expires_at', date('Y-m-d H:i:s', $this->expiry_timestamp), PDO::PARAM_STR);

        return $stmt-> execute();
    }
}
