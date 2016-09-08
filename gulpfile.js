var elixir = require('laravel-elixir');
require('laravel-elixir-imagemin');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.images = {
    folder: 'img',
    outputFolder: 'img'
};

var paths = {
    'jquery': './vendor/bower_components/jquery/',
    'bootstrap': './node_modules/bootstrap-sass/',
    'metisMenu': './vendor/bower_components/metisMenu/dist/',
    'maskedInput': './vendor/bower_components/jquery.maskedinput/',
    'fontAwesome': './vendor/bower_components/font-awesome/',
    'datePicker': './vendor/bower_components/bootstrap-datepicker/'
};

elixir(function(mix) {
    mix.sass('app.scss', 'public/css/', {
        includePaths: [
            paths.fontAwesome + 'scss/'
        ]})
    .sass('admin.scss', 'public/css/', {
        includePaths: [
            paths.fontAwesome + 'scss/'
        ]})
    .sass('dropzone.scss', 'public/css/')
    .imagemin()
    .copy('./resources/assets/js/dropzone.js','public/js')
    .copy(paths.fontAwesome + 'fonts', 'public/fonts')
    .copy('./resources/assets/fonts/', 'public/fonts')
    .scripts([
        //paths.jquery + "dist/jquery.js",
        "./resources/assets/js/jquery.min.js",
        paths.bootstrap + "assets/javascripts/bootstrap.js",
        "./resources/assets/js/jquery.validate.js",
        "./resources/assets/js/messages_es.min.js",
        paths.metisMenu + "metisMenu.js",
        "./resources/assets/js/admin.js"
    ], 'public/js/admin.js','./')
    .scripts([
        //paths.jquery + "dist/jquery.js",
        "./resources/assets/js/jquery.min.js",
        paths.bootstrap + "assets/javascripts/bootstrap.js",
        paths.maskedInput + "dist/jquery.maskedinput.js",
        "./resources/assets/js/jquery.validate.js",
        "./resources/assets/js/messages_es.min.js",
        "./resources/assets/js/lity.js",
        "./resources/assets/js/main.js"
    ], 'public/js/app.js','./')
    .scripts([
        paths.datePicker + "dist/js/bootstrap-datepicker.js",
        paths.datePicker +"dist/locales/bootstrap-datepicker.es.min.js"
    ],'public/js/datePicker.js','./')
    .scripts([
        "./resources/assets/js/jquery.dataTables.min.js",
        "./resources/assets/js/dataTables.bootstrap4.min.js"
    ],'public/js/dataTables.js','./');
});
