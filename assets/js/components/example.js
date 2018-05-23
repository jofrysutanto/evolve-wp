/*
 * EXAMPLE_PLUGIN_NAME Plugin
 *
 */

+function ($) { "use strict";
    var componentDataName = 'PLUGIN_NAME';
    var componentControlName = 'PLUGIN_NAME';
    
    // EXAMPLE_PLUGIN_NAME CLASS DEFINITION
    // ============================

    var ExamplePluginClass = function(element, options) {
        var self         = this;
        this.options     = options;
        this.el          = element;
        this.$el         = $(element);
        this.init();
    }

    ExamplePluginClass.DEFAULTS = { }

    ExamplePluginClass.prototype.init = function() {
        var self = this;
    }

    // EXAMPLE_PLUGIN_NAME PLUGIN DEFINITION
    // ============================

    $.fn.ExamplePluginClass = function (option) {
        var args = Array.prototype.slice.call(arguments, 1);

        return this.each(function () {
            var $this   = $(this)
            var data    = $this.data('trueper.' + componentDataName)
            var options = $.extend({}, ExamplePluginClass.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data) $this.data('trueper.' + componentDataName, (data = new ExamplePluginClass(this, options)))
            else if (typeof option == 'string') data[option].apply(data, args)
        })
    }

    $.fn.ExamplePluginClass.Constructor = ExamplePluginClass

    // EXAMPLE_PLUGIN_NAME Initialisation
    // ===============

    $(document).on('ready', function () {
        $('[data-control="' + componentControlName + '"]').ExamplePluginClass();
    });

}(window.jQuery);
