'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    clean = require('gulp-clean'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    preprocess = require('gulp-preprocess'),
    filesize = require('gulp-filesize');

var config = {
    publicDir: './client',
    scriptsDir: './scripts',
    stylesDir: './styles',
    templatesDir: './templates',
    bootstrapDir: './node_modules/bootstrap-sass'
};

gulp.task('default',['css', 'fonts', 'js', 'html', 'angular-html'], function() {
});

// OPTIMIZATION TASKS
gulp.task('clean', function () {
	return gulp.src(config.publicDir + '/*', {read: false})
		.pipe(clean());
});

gulp.task('css', function () {
    return gulp.src(config.stylesDir + '/*.scss')
    .pipe(concat('styles.css'))
    .pipe(sass({
        includePaths: [config.bootstrapDir + '/assets/stylesheets'],
    }))
    .pipe(gulp.dest(config.publicDir + '/css'));
});

gulp.task('fonts', function() {
    return gulp.src(config.bootstrapDir + '/assets/fonts/**/*')
    .pipe(gulp.dest(config.publicDir + '/fonts'));
});

gulp.task('js', function() {
	return gulp.src([config.scriptsDir + '/*.js',config.scriptsDir + '/**/*.js'])
		.pipe(concat('app.js'))
		.pipe(filesize())
		//.pipe(uglify())
		.pipe(filesize())
		.pipe(gulp.dest(config.publicDir + '/js'));
});

gulp.task('html', function() {
	return gulp.src(['*.html', '!' + config.templatesDir + '/'])
		.pipe(preprocess({includeBase: config.templatesDir}))
		.pipe(gulp.dest(config.publicDir));
});

gulp.task('angular-html', function() {
	return gulp.src([config.scriptsDir + '/**/*.html']) // IGNORE INCLUDES
		.pipe(gulp.dest(config.publicDir + '/templates'));
});