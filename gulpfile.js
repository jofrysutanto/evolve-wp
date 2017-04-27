var solidPath = __dirname + '/lib/solid/';
var solid = require(solidPath + 'assets/build/solid-gulp');

// Polyfill
require(solidPath + 'assets/build/polyfill');

//
// Configure solid
// ----------------------
solid
    .configure()
    .from(solidPath + 'assets/build/configs/wp.js')
    .from(__dirname + '/assets/config.js')

//
// Register tasks
// ----------------------
solid
    .sass('theme')
    .as('main.min.css')
    .message('Theme - Sass files completed')
    .watch()
    .to('css/')

solid
    .css('vendor')
    .as('vendor.min.css')
    .message('Vendor CSS - Combined')
    .watch()
    .to('css/')

solid
    .uglify('app')
    .as('main.min.js')
    // .beautify()
    // .sourcemaps()
    .message('Application Javascript compiled')
    .watch()
    .to('js/dist/')

solid
    .concat('vendor')
    .as('vendor.min.js')
    // .beautify()
    // .sourcemaps()
    .message('Vendor javascript combined')
    .watch()
    .to('js/dist/')

solid
    .concat('combine_js')
    .as('packed.min.js')
    .message('Scripts Packed')
    .watch()
    .to('js/dist/')

//
// Group tasks
// -------------------------
solid.task('default', [
    'sass.theme', 
    'css.vendor', 
    'uglify.app', 
    'concat.vendor',
    'concat.combine_js',
], function() {
    solid
        .version()
        .to('version.json')
});