;(function ($, App) {

    'use strict';

    /**
     * This partial javascript compiles into minified script file
     * and is a great place to register all globally running script.
     *
     * init() method block gets called automatically on *every* page,
     * use this as a starting point to invoke methods
     */

    var Common = function () {}

    Common.prototype.init = function() {
        App.Global.onRender();
    }

    window.App.Common = new Common()

})(jQuery, window.App);
