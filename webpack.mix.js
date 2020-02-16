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

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');
mix
    .sass('node_modules/bootstrap/scss/bootstrap.scss','public/site/bootstrap.css')
    .scripts('node_modules/jquery/dist/jquery.js', 'public/site/jquery.js')
    .scripts('node_modules/bootstrap/dist/js/bootstrap.bundle.js', 'public/site/bootstrap.js')
    .scripts('resources/validations/createEditUser.js', 'public/site/validations/createEditUser.js').version()
    .scripts('resources/validations/createSms.js', 'public/site/validations/createSms.js').version()
    .scripts('resources/validations/createEditPaymentSlip.js', 'public/site/validations/createEditPaymentSlip.js').version();
