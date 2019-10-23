<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PageHome extends Controller
{
    // Pass on all fields from Advanced Custom Fields to the view
    protected $acf = true;

    public function welcome()
    {
        return "Let's get started!";
    }
}
