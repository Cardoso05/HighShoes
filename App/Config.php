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
    public const DB_NAME = 'highshoesdb';

    /**
     * Database user
     * @var string
     */
    public const DB_USER = 'highshoesadmin';

    /**
     * Database password
     * @var string
     */
    public const DB_PASSWORD = 'highshoes';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    public const SHOW_ERRORS = true;
}
