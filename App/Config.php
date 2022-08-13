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
    public const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    public const DB_NAME = 'postgres';

    /**
     * Database Port
     * @var string
     */
    public const DB_PORT = '5432';

    /**
     * Database user
     * @var string
     */
    public const DB_USER = 'postgres';

    /**
     * Database password
     * @var string
     */
    public const DB_PASSWORD = 'familia01';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    public const SHOW_ERRORS = true;
    /**
     * Secret key for hashing
     * @var string
     *  
     */    
    const SECRET_KEY = 'OjMkQCnVBQP5ht0IAMBtZElhJmGMN0pQ';

    /**
     * Mailgun key
     * @var string
     */
    const MAILGUN_API_KEY = 'e00e4563637b579854c24f1e52ef81ce-2bab6b06-49477af0';
    
    /**
     * Mailgun domain
     * @var string
     */
    const MAILGUN_DOMAIN = 'sandbox40d9f99ede264346b0f98aeff86669a7.mailgun.org';


}