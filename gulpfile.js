const gulp = require('gulp');
var sass = require("gulp-sass");
sass.compiler = require('node-sass');
var uglifycss = require('gulp-uglifycss');
var uglify = require('gulp-uglify');
var imagemin = require('gulp-imagemin');
/*scss to css*/
gulp.task('scss_to_css', function () {
    return gulp
        .src('./app/src-for-public/css/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./public/css/'));
});
//compress css
gulp.task('ugly_css', function () {
    return gulp
        .src('./public/css/**/*.css')
        .pipe(uglifycss({
            'uglyComments': false,
            'keepSpecialComments' : true
        }))
        .pipe(gulp.dest('./public/css/'));
});
//compress js
gulp.task('ugly_js', function () {
    return gulp
        .src('./app/src-for-public/js/**/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('./public/js/'));
});
//compress img
gulp.task('comp_img', function () {
    return gulp
        .src('./app/src-for-public/img/*')
        .pipe(imagemin())
        .pipe(gulp.dest('./public/img/'));
});
//all in one
gulp.task('default',
    gulp.series('scss_to_css', 'ugly_css', 'ugly_js', 'comp_img'));