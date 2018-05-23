<?php
    /**
     * Template Name: Panels
     */
    
    echo view('panels/loop', ['panels' => get_field('panels')]);