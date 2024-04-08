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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
   	.styles([
    'resources/coreui/css/font-awesome.min.css',
    'resources/coreui/css/simple-line-icons.min.css',
    'resources/coreui/css/style.css'
	],'public/css/coreui.css')
	.scripts([
    /*'resources/coreui/js/jquery.min.js',
    'resources/coreui/js/popper.min.js',
    'resources/coreui/js/bootstrap.min.js',*/
    'resources/coreui/js/pace.min.js',
    'resources/coreui/js/Chart.min.js',
    'resources/coreui/js/template.js',
    'resources/coreui/js/sweetalert2.all.js'
	],'public/js/coreui.js');

mix.browserSync('http://glp.local/');