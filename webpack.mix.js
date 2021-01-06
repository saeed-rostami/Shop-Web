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


mix.js('resources/js/postsPagination.js' , 'public/js/Pagination');
mix.js('resources/js/productsPagination.js' , 'public/js/Pagination');
mix.js('resources/js/Admin-Custom.js' , 'public/Admin/js');

mix.postCss('resources/sass/Admin-Custom.css' , 'public/Admin/CSS');
mix.postCss('resources/sass/Breadcrumb.css' , 'public/css/Breadcrumb');
mix.postCss('resources/sass/Navbar.css' , 'public/css/Navbar');
mix.postCss('resources/sass/pagination.css' , 'public/css/Pagination');



mix.copyDirectory('resources/fonts', 'public/fonts');

