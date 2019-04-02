<?php

namespace App\Wordpress;

use EvolveEngine\Core\WordpressBase;

class Main extends WordpressBase
{
    /**
     * Register all custom hooks and filters here
     * Use $this->filter() and $this->action() to register filters and actions.
     * Use $this->ajax() for ajax events
     * It is also possible to modularised this into multiple classes, all
     * you have to do is register them in AppServiceProvider and extend WordpressBase
     *
     * @return void
     */
    public function init()
    {
        //
        // Actions
        // ==
        // Add actions here

        //
        // Filters
        // ==
        // Add your filters here
    }

    //
    // Hooks, Actions, & Filters
    //
}
