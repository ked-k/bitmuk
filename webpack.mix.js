const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');
mix.styles(['resources/js/app.js'], 'public/css/app.css').version();

mix.styles([
    'public/css/social-icons.css',
    'public/css/owl.carousel.css',
    'public/css/owl.theme.css',
    'public/css/prism.css',
    'public/css/main.css',
    'public/css/custom.css',
], 'public/css/all.css').version();


mix.js(
    'public/js/scripts.js', 'public/js/scripts.min.js')
    .js('resources/assets/js/profile.js', 'public/assets/js/profile.js')
    .js('resources/assets/js/custom/custom.js', 'public/assets/js/custom/custom.js')
    .js('resources/assets/js/custom/custom-datatable.js', 'public/assets/js/custom/custom-datatable.js')
    .version();

mix.js('resources/assets/js/alpine.js',
    'public/js/alpine.js');


mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css',
    'public/assets/css/bootstrap.min.css');

mix.copy('node_modules/datatables.net-dt/css/jquery.dataTables.min.css',
    'public/assets/css/jquery.dataTables.min.css');

mix.copy('resources/assets/images', 'public/assets/images');
mix.copy('resources/assets/fonts', 'public/assets/fonts');

mix.copy('node_modules/datatables.net-dt/images', 'public/assets/images');
mix.copy('node_modules/select2/dist/css/select2.min.css',
    'public/assets/css/select2.min.css');
mix.copy('node_modules/sweetalert/dist/sweetalert.css',
    'public/assets/css/sweetalert.css');
mix.copy('node_modules/izitoast/dist/css/iziToast.min.css',
    'public/assets/css/iziToast.min.css');
mix.copy('node_modules/summernote/dist/summernote-bs4.css',
    'public/assets/css/summernote-bs4.css');
mix.copy('node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css',
    'public/assets/css/colorpicker.css');

mix.babel('node_modules/chocolat/dist/js/chocolat.js',
    'public/assets/js/chocolat.js');

mix.copy('node_modules/chocolat/dist/css/chocolat.css',
    'public/assets/css/chocolat.css');

mix.copy('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css',
    'public/assets/css/tagsinput.css');

mix.copy('node_modules/izitoast/dist/css/iziToast.css',
    'public/assets/css/iziToast.css');


mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/css',
    'public/assets/css/@fortawesome/fontawesome-free/css');
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts',
    'public/assets/css/@fortawesome/fontawesome-free/webfonts');
mix.copyDirectory('node_modules/summernote/dist/font',
    'public/assets/css/font');

//front
mix.copyDirectory('resources/front-assets',
    'public/front-assets');
//end front

mix.babel('node_modules/jquery.nicescroll/dist/jquery.nicescroll.js',
    'public/assets/js/jquery.nicescroll.js');
mix.babel('node_modules/jquery/dist/jquery.min.js',
    'public/assets/js/jquery.min.js');
mix.babel('node_modules/popper.js/dist/umd/popper.min.js',
    'public/assets/js/popper.min.js');
mix.babel('node_modules/bootstrap/dist/js/bootstrap.min.js',
    'public/assets/js/bootstrap.min.js');
mix.babel('node_modules/datatables.net/js/jquery.dataTables.min.js',
    'public/assets/js/jquery.dataTables.min.js');
mix.babel('node_modules/select2/dist/js/select2.min.js',
    'public/assets/js/select2.min.js');
mix.babel('node_modules/sweetalert/dist/sweetalert.min.js',
    'public/assets/js/sweetalert.min.js');
mix.babel('node_modules/izitoast/dist/js/iziToast.min.js',
    'public/assets/js/iziToast.min.js');
mix.babel('node_modules/summernote/dist/summernote-bs4.js',
    'public/assets/js/summernote-bs4.js');
mix.babel('node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js',
    'public/assets/js/colorpicker.js');

mix.babel('node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js',
    'public/assets/js/tagsinput.js');

mix.babel('node_modules/chocolat/dist/js/chocolat.js',
    'public/assets/js/chocolat.js');

mix.babel('resources/assets/js/uploadPreview.js',
    'public/assets/js/uploadPreview.js');

mix.babel('resources/assets/js/jquery-sortable.js',
    'public/assets/js/jquery-sortable.js');

mix.babel('resources/assets/js/chart.js',
    'public/assets/js/chart.js');

mix.babel('node_modules/izitoast/dist/js/iziToast.js',
    'public/assets/js/iziToast.js');

//front


