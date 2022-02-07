const mix = require('laravel-mix')

mix.js('resources/js/home.js', 'public/js')
    .sass('resources/scss/home.scss', 'public/css')