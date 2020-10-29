const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent Api for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(['resources/js/app.js',
        'resources/js/Custom.js']
    , 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/Pagination.js' , 'public/js/Pagination');
mix.js('resources/js/Admin-Custom.js' , 'public/js/AdminCustom');

mix.postCss('resources/sass/Admin-Custom.css' , 'public/css/AdminCustom');
mix.postCss('resources/sass/Breadcrumb.css' , 'public/css/Breadcrumb');
mix.postCss('resources/sass/Navbar.css' , 'public/css/Navbar');
mix.postCss('resources/sass/Products.css' , 'public/css/Products');
mix.copyDirectory('resources/fonts', 'public/fonts');