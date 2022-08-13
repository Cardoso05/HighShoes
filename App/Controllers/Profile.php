<?php

namespace App\Controllers;

use \Core\View;
use App\Auth;
/**
 * Profile controller
 */

 class Profile extends Authenticated
 {
    
    /**
     * Show the profile 
     * 
     * @return void
     */
    public function showAction()
    {
        View::renderTemplate('Profile/show.html', [
            'user' => Auth::getUser()
        ]);
    }

    /**
     * Show the form for editing the profile
     * 
     * @return void
     */
    public function editAction()
    {
        View::renderTemplate('Profile/edit.html',[
            'user' => Auth::getUser()
        ]);
    }
 }