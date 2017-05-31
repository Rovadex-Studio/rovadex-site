'use strict';

let gulp = require('gulp'),
	rename = require("gulp-rename"),
	notify = require('gulp-notify'),
	autoprefixer = require('gulp-autoprefixer'),
	sass = require('gulp-sass');

//css
gulp.task('css', () => {
	return gulp.src('./assets/sass/style.scss')
		.pipe(sass())
		.pipe(autoprefixer({
				browsers: ['last 10 versions'],
				cascade: false
		}))
		.pipe(rename('style.css'))
		.pipe(gulp.dest('./'))
		.pipe(notify('Compile Sass Done!'));
});

//watch
gulp.task('watch', () => {
	gulp.watch('./assets/sass/**', ['css'])
});
