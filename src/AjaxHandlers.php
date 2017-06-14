<?php

namespace App;

use Illuminate\Support\Fluent;
use EvolveEngine\Core\WordpressBase;

class AjaxHandlers extends WordpressBase
{
    /**
     * Independent class for ajax events
     * Use $this->ajax() to register ajax method
     *
     * @return void
     */
    public function init()
    {
        //
        // Ajax
        // ==
        // $this->ajax('ajax_action_name', 'ajaxMethod');
    }
}
