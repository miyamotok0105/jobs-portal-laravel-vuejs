const mix = require('laravel-mix');

//js
mix.js('resources/js/app/app.js', 'public/js');
mix.js('resources/js/dashboard/dashboard.js', 'public/js');

//sass
mix.sass('resources/sass/app/app.scss', 'public/css');
mix.sass('resources/sass/dashboard/dashboard.scss', 'public/css');
