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
    public const DB_HOST = 'ec2-52-72-99-110.compute-1.amazonaws.com';

    /**
     * Database name
     * @var string
     */
    public const DB_NAME = 'depprhnf10llrd';

    /**
     * Database Port
     * @var string
     */
    public const DB_PORT = '5432';

    /**
     * Database user
     * @var string
     */
    public const DB_USER = 'qgievlegxixaoq';

    /**
     * Database password
     * @var string
     */
    public const DB_PASSWORD = '552d04b2eea0ec8358d8752990ee01a0aab581bf93503b11126983e7bb475c0c';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    public const SHOW_ERRORS = true;

    /**
     * Secret key for hashing
     * @var boolean
     *  
     */    
    const SECRET_KEY = 'OjMkQCnVBQP5ht0IAMBtZElhJmGMN0pQ';

    /**
     * Mailgun API Key
     * 
     * @var string
     */
    const MAILGUN_API_KEY = '20bf292d94f2e4ee0790a3f57113a436-4f207195-fcbe04e0';

    /**
     * Mailgun domain
     * 
     * @var string
     */
    const MAILGUN_DOMAIN =  'sandbox3427b6bfa5264f13b682608a530418a3.mailgun.org';
}