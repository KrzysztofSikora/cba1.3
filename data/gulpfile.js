var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var header = require('gulp-header');
var cleanCSS = require('gulp-clean-css');
var rename = require("gulp-rename");
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var pkg = require('./package.json');

// Set the banner content
var banner = ['/*!\n',
  ' * Krzysztof Sikora personal website - <%= pkg.title %> v<%= pkg.version %> (<%= pkg.homepage %>)\n',
  ' * Copyright 2017-' + (new Date()).getFullYear(), ' <%= pkg.author %>\n',
  ' */\n',
  ''
].join('');


// Minify compiled CSS
gulp.task('minify-css', function() {
  return gulp.src('css/*.css')
      .pipe(concat('style.css'))
    .pipe(cleanCSS({
      compatibility: 'ie8'
    }))
    .pipe(rename({
      suffix: '.min'
    }))
    .pipe(gulp.dest('css'))
    .pipe(browserSync.reload({
      stream: true
    }))
});
// gulp.task('css', function () {
//     return gulp.src('css/**/*.css')
//         .pipe(concat('style.css'))
//         .pipe(cleanCSS)
//         .pipe(gulp.dest('dist/css'));
//
// });
// // Minify custom JS
// gulp.task('minify-js', function() {
//   return gulp.src('js/creative.js')
//     .pipe(uglify())
//     .pipe(header(banner, {
//       pkg: pkg
//     }))
//     .pipe(rename({
//       suffix: '.min'
//     }))
//     .pipe(gulp.dest('js'))
//     .pipe(browserSync.reload({
//       stream: true
//     }))
// });



// Default task
gulp.task('default', ['minify-css']);
