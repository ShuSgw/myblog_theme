const gulp = require('gulp');
const requireDir = require('require-dir');

requireDir('./gulp/tasks', { recurse: true });

gulp.task('server', gulp.series('browser-sync'));
