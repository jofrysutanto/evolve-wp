;(function ($, App) {

    'use strict';

    /**
     * This is globally callable script in the application,
     * useful to centralise scripts that can be called during 
     * certain events such as initialising plugins that runs
     * after page load AND ajax load
     */

    var Global = function () {}

    Global.prototype.onRender = function() {
        window.bLazy = new Blazy();
    }

    window.App.Global = new Global()

})(jQuery, window.App);
