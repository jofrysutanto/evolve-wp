/**
 * Gulp configuration, so Gulpfile.js can focus on running task
 * instead of configuring stuff.
 */

var asset_path   = "assets/";

var config = {
    // Path to assets
    asset_path: asset_path,

    /**
     * Source paths, for each tasks
     */
    sass : {
        theme: [
            asset_path + "scss/app.scss"
        ],
    },
    concat : {
        vendor : [
            // Tooltip loaded first, because some other depends on this
            asset_path + "vendor/bootstrap/js/tooltip.js",

            // Exclude some bootstrap javascript we dont use
            '!' + asset_path + "vendor/bootstrap/js/affix.js",
            '!' + asset_path + "vendor/bootstrap/js/carousel.js",

            asset_path + "vendor/bootstrap/js/*.js",
            asset_path + 'vendor/modernizr.js',
            asset_path + "vendor/*/js/*.js",
        ],
        combine_js : [
            asset_path + "js/dist/vendor.min.js",
            asset_path + "js/dist/main.min.js",
        ],
        
    },
    uglify : {
        app : [
            // Uglify has now been deprecated in favour of babel
        ]
    },
    babel : {
        app : [
            asset_path + "js/true-packed.js",
            asset_path + "js/init.js",
            asset_path + "js/partials/_global.js",
            asset_path + "js/partials/*.js",
            asset_path + "js/libraries/foundation.baseclass.js",
            asset_path + "js/libraries/foundation.controlutils.js",
            asset_path + "js/libraries/*.js",
            asset_path + "js/components/**/*.js",
            asset_path + "js/routes.js"
        ]
    },
    css : {
        vendor : [
            asset_path + "vendor/*/css/*.css",
        ],
    },

    /**
     * Additional watch files,
     * by default all files in source paths are watched
     */
    watch: {
        // CSS
        sass : {
            theme: [
                asset_path + 'scss/**/*.scss',
                asset_path + 'vendor/*/scss/**/*.scss'
            ],
        }
    },

}; // ./ config

module.exports = exports = config;