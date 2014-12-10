var gulp = require('gulp'),
sass = require('gulp-ruby-sass'),
rename = require('gulp-rename'),
notify = require('gulp-notify'),
minifycss = require('gulp-minify-css'),
livereload = require('gulp-livereload'),
autoprefixer = require('gulp-autoprefixer')
//lr = require('tiny-lr'),
concat = require('gulp-concat'),
//server = lr(),
uglify = require('gulp-uglify');



// Default task
gulp.task('default', function() {
    gulp.start('styles', 'scripts');
});


//Styles
gulp.task('styles', function(){
    return gulp.src('sass/master.scss')
     .pipe(sass({ style: 'expanded', errLogToConsole: false }))
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(gulp.dest('dist/styles/unminified'))
    .pipe(rename({ suffix: '.min' }))
    .pipe(minifycss())
    .pipe(livereload())
    .pipe(gulp.dest('dist/styles/minified'))
    .pipe(notify({ message: 'Styles task complete' }));
});

//Scripts
gulp.task('scripts', function(){
    return gulp.src(['./js/casi_custom.js'])
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/scripts/unminified'))
    .pipe(rename({suffix:'.min'}))
    .pipe(uglify())
    .pipe(livereload())
    .pipe(gulp.dest('dist/scripts/minified'))
    .pipe(notify({ message: 'Scripts task complete' }));
});

// Watch
gulp.task('watch', function() {

  // Listen on port 35729

livereload.listen()

// Watch .scss files
    gulp.watch('sass/**/*.scss', ['styles']);

    // Watch .js files
    gulp.watch('js/**/*.js', ['scripts']);

});