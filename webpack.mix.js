let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

mix.js("resources/js/app.js", "public/js")
.postCss("resources/css/app.css", "public/css", [
    require("tailwindcss"),
    require("autoprefixer"),
]);
