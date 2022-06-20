<?php

namespace App;

use App\Config;

/**
 * Unique random tokens
 */

 class Token
 {
    /**
     * The token value
     * @var string
     */
    protected $token;

    /**
     * Class constructor. Create a new random token
     * @param string $value (optional) A token value
     *
     * @return string  A 32-character token
     */
    public function __construct($token_value = null)
    {
        if($token_value){
            $this->token = $token_value;
        }else{
            $this->token = bin2hex(random_bytes(16)); // 32 hex characters
        }
    }

    /**
     * Get the token value
     * 
     * @return string 
     */
    public function getValue()
    {
        return $this->token;
    }

    /**
     * Get the hashed token value
     * 
     * @return string
     */
    public function getHash()
    {
        return hash_hmac('sha256', $this->token, Config::SECRET_KEY);
    }

 }