let mix = require('laravel-mix');

mix
  .js('assets/js/app.js', 'js')
  .sass('assets/sass/style.scss', 'css')
  .setPublicPath('assets/dist')
  .browserSync('http://localhost/your_theme_name');
