const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const requireDir = require('require-dir');

requireDir('../../tasks', {
    recurse: true
});

gulp.task('browser-sync', function () {

    browserSync.init({
        files: ["./**/*.php", "./**/*.js", "./**/*.html", "./**/*.scss"],
        proxy: "http://myblog.lo/"
    });

    gulp.watch('./components/**/*.scss', gulp.series('watch:scss'));
    gulp.watch('./style.css').on('change', browserSync.reload);

    gulp.watch('./components/**/*.js', gulp.series('babel'));
    gulp.watch('./babel.js').on('change', browserSync.reload);
});



// browser-sync
// task("browser-sync", () => {
//     return browserSync.init({
//         files: ["./**/*.php", "./**/*.js", "./**/*.html", "./**/*.scss"],
//         proxy: "http://myblog.lo/", // Change to your Local WP URL
//         ghostMode: {
//             scroll: false,
//             clicks: false,
//             location: false,
//             forms: false,
//         },
//     });
// });

// // browser-sync reload
// task("reload", (done) => {
//     browserSync.reload();
//     done();
// });

// //watch
// task("watch", (done) => {
//     watch(["./**/*.scss"], series("sass", "reload"));
//     watch('./src/assets/js/*.js', series("babel", "reload"));
//     done();
// });
// task("default", parallel("watch", "browser-sync"));