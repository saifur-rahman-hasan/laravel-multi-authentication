let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/assets/js/website/home/website.js', 'public/js/website/home')
//     .sass('resources/assets/sass/app.scss', 'public/css');



mix.js('resources/assets/js/website/home/welcome.js', 'public/js/website/home')
    .sass('resources/assets/sass/website/home/welcome.scss', 'public/css/website/home')
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery']
    });