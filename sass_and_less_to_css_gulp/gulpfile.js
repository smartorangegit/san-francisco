
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    useref = require('gulp-useref'),
    // cleanCSS = require('gulp-clean-css'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    less = require('gulp-less'),
     path = require('path');


// SASS
gulp.task('sass', function(){
  return gulp.src('app/sass/style.scss')
    .pipe(sass())
    .pipe(gulp.dest('app/css'))
});
// SASS



// LESS
gulp.task('less', function () {
  return gulp.src('app/less/*.less')
    .pipe(less({
      paths: [ path.join(__dirname, 'less', 'includes') ]
    }))
    .pipe(gulp.dest('./app/less'));
});
// LESS


// CSS
gulp.task('css', function() {
  return gulp.src('app/css/style.css')
    .pipe(autoprefixer({
            browsers: ['last 10 versions'],
            cascade: true
        }))
    // .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('dist'));
});
// CSS


// JS
gulp.task('js', function () {
  return gulp.src('app/js/main.js')
    .pipe(uglify())
    .pipe(gulp.dest('dist/js'))
});
// JS




gulp.task('watch',['less', 'sass', 'css', 'js'], function(){
  gulp.watch('app/sass/**/*.scss', ['sass']);
  gulp.watch('app/less/**/*.less', ['less']);
  gulp.watch('app/css/main.css', ['css']);
  gulp.watch('app/js/main.js', ['js']);
});