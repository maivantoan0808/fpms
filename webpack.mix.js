const mix = require('laravel-mix');

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

/*
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
*/

//Assets in auth
mix.copy('resources/assets/template/css/vendors.bundle.css',
    'public/assets/auth/css/vendors.bundle.css');
mix.copy('resources/assets/template/css/style.bundle.css',
    'public/assets/auth/css/style.bundle.css');

mix.copy('resources/assets/template/js/vendors.bundle.js',
    'public/assets/auth/js/vendors.bundle.js');
mix.copy('resources/assets/template/js/scripts.bundle.js',
    'public/assets/auth/js/scripts.bundle.js');
mix.copy('resources/assets/template/js/login.js',
    'public/assets/auth/js/login.js');

mix.copy('resources/assets/template/img/favicon.ico',
    'public/assets/auth/img/favicon.ico');
mix.copy('resources/assets/template/img/bg-1.jpg',
    'public/assets/auth/img/bg-1.jpg');
mix.copy('resources/assets/template/img/logo-1.png',
    'public/assets/auth/img/logo-1.png');

