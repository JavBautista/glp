const mix = require('laravel-mix');
const webpack = require('webpack'); // Agregar esta línea

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
	],'public/js/coreui.js')
    .vue()
    .sourceMaps();

    mix.webpackConfig({
        plugins: [
            new webpack.DefinePlugin({
                __VUE_OPTIONS_API__: true,
                __VUE_PROD_DEVTOOLS__: false,
                __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false
            })
        ]
    });

mix.browserSync('http://glp.test/');