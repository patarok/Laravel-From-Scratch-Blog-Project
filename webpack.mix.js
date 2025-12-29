let mix = require('laravel-mix');
require('laravel-mix-polyfill');
require('dotenv').config();

mix.js('resources/js/app.js', 'public/js')
   .postCss('resources/css/app.css', 'public/css', [  // ✅ Changed to .postCss()
       require("postcss-import"),
       require('tailwindcss'),
       require("autoprefixer"),
   ])
   .postCss('resources/css/tailwind/tailwind.css', 'public/css', [
       require("postcss-import"),
       require('tailwindcss'),
       require("autoprefixer"),
   ])
   .sourceMaps()
   .setPublicPath('web/assets')
   .version()
   .polyfill({
       enabled: true,
       useBuiltIns: "usage",
       targets: {
           "firefox": 68,
           "safari": 12,
           "ie": 11,
           "chrome": 70,
           "edge": 15
       }
   })
   .browserSync({
       proxy: 'nginx:80',
       open: false,
       port: 3000,
       ui: {
           port: 3001
       },
       files: [
           'tailwind.config.js', 
           'resources/js/**/*.js',
           'resources/css/**/*.css',
           'resources/views/**/*.php',
           'resources/views/**/*.blade.php'
       ]
   });