var gulp = require('gulp');

// Automate phpSpec Testing
var phpspec = require('gulp-phpspec');

// Run Commands to Terminal
var run = require('gulp-run');

// Change pipe Behavior for error handling
var plumber = require('gulp-plumber');

// Notify of Error and Success
var notify = require('gulp-notify');

gulp.task('test', function() {
    gulp.src('spec/**/*.php')
        .pipe(plumber())
        .pipe(phpspec('', { 'verbose': 'v', notify: true }))
        .on('error', notify.onError({
            title: "Error",
            message: "Your tests failed, Ahmed!"
        }))
        .pipe(notify({
            title: "Success",
            message: "Every thing is Working"
        }));
});

gulp.task('watch', function() {
    gulp.watch(['spec/**/*.php', 'src/**/*.php'], ['test']);
});


gulp.task('clear_terminal', function() {
    return run('clear').exec() ;
});

gulp.task('default', ['clear_terminal','test', 'watch']);