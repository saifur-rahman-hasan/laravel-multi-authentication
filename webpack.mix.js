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

 mix.js('resources/assets/js/website/home/welcome.js', 'public/js/website/home')
    .js('resources/assets/js/website/home/index.js', 'public/js/website/home')
    .js('resources/assets/js/website/auth/login.js', 'public/js/website/auth')
    .js('resources/assets/js/website/categories/index.js', 'public/js/website/categories')
    .js('resources/assets/js/website/categories/show.js', 'public/js/website/categories');
   // .sass('resources/assets/sass/app.scss', 'public/css');
