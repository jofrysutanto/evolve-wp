var 
    BaseTask   = require('./base'),
    gulp       = require('gulp'),
    plumber    = require('gulp-plumber'),
    concat     = require('gulp-concat'),
    babel      = require('gulp-babel'),
    notify     = require('gulp-notify'),
    livereload = require('gulp-livereload'),
    sourcemaps = require('gulp-sourcemaps'),
    gulpif     = require('gulp-if'),
    uglify     = require('gulp-uglify'),
    lib        = require('./../lib')
;

var SolidBabel = function (key, options, config) {
    this._prefix = 'babel.'
    this._message = 'Javascipt compiled'
    this._key = this._prefix + key
    this._config = config
    this._options = options
    this._as = null
    this._to = null
    this._uglifyOptions = {}
    this._babelOptions = {
        presets: ['es2015']
    }
    this._useSourcemaps = false;
}

SolidBabel.prototype = new BaseTask;
SolidBabel.prototype.constructor = SolidBabel

SolidBabel.prototype.beautify = function () {
    this._uglifyOptions = {
        mangle: false,
        compress: false,
        output: {
            beautify: true
        }
    }
    return this
}

SolidBabel.prototype.sourcemaps = function () {
    this._useSourcemaps = true
    return this
}

SolidBabel.prototype.to = function(to) {
    var self = this
    this._to = to
    var target = this.determineTarget(to)
    var isLocal = this._config.isLocal

    return gulp.task(self._key, function () {
        return gulp.src(lib.pathKey(self._key, self._config))
                .pipe(plumber({errorHandler: lib.onError}))
                .pipe(gulpif(self._useSourcemaps, sourcemaps.init()))
                    .pipe(concat(self._as))
                    .pipe(babel(self._babelOptions))
                    .pipe(uglify(self._uglifyOptions))
                .pipe(gulpif((self._useSourcemaps && isLocal), sourcemaps.write()))
                .pipe(gulp.dest( target ))
                .pipe(gulpif(isLocal, livereload()))
                .pipe(gulpif(isLocal, notify({ message: self._message })))
    });
}

module.exports = exports = SolidBabel;
