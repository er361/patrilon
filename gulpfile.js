/**
 * Created by Erbol on 16.08.2016.
 */
var gulp = require('gulp');
var browserSync = require('browser-sync');
var path = {
    php: 'backend/**/*.php',
    js: 'backend/web/js/*.js',
    css: 'backend/web/css/*.css'
};
gulp.task('watch', function () {
    gulp.watch(path.php,['reload']);
    gulp.watch(path.js,['reload']);
    gulp.watch(path.css,['reload']);
});
gulp.task('reload', function () {
    browserSync.reload();
});
gulp.task('browserSync', function () {
    browserSync({
        proxy: 'patrilon.dev'
    })
});

gulp.task('default',['watch','browserSync']);




