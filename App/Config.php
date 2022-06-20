<?php
namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{
    /**
     * Database host
     * @var string
     */
     const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
     const DB_NAME = 'postgres';

    /**
     * Database Port
     * @var string
     */
     const DB_PORT = '5432';

    /**
     * Database user
     * @var string
     */
     const DB_USER = 'postgres';

    /**
     * Database password
     * @var string
     */
     const DB_PASSWORD = 'familia01';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
     const SHOW_ERRORS = true;

    /**
     * Secret key for hashing
     * @var boolean
     *  
     */    
    const SECRET_KEY = 'OjMkQCnVBQP5ht0IAMBtZElhJmGMN0pQ';
}