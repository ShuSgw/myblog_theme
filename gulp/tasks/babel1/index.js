const gulp = require('gulp');
const uglify = require('gulp-uglify');
const browserify = require('browserify');
const source = require('vinyl-source-stream');
const babelify = require('babelify');
var sourcemaps = require('gulp-sourcemaps');

const path = {
    dstDir: './',
    srcDir: './components/index.js'
}

gulp.task('babel', function () {
    return browserify(path.srcDir, { debug: true })
        .transform(babelify.configure({
            presets: ["@babel/env"],
            sourceType: "module",
            // presets: ["es2015"],
            sourceMaps: true
        }))
        .bundle()
        .pipe(source('bundle.js'))
        .pipe(gulp.dest(path.dstDir));
});

gulp.task('babel:compress', function () {
    return gulp.src('./bundle.js')
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(uglify())
        .pipe(sourcemaps.write('./maps'))
        .pipe(gulp.dest(path.dstDir));
});