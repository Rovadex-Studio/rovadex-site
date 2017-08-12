'use strict';

let gulp = require('gulp'),
	rename = require("gulp-rename"),
	notify = require('gulp-notify'),
	autoprefixer = require('gulp-autoprefixer'),
	minify = require('gulp-csso'),
	sass = require('gulp-sass'),
	zip = require('gulp-zip'),
	svgmin = require('gulp-svgmin');

//css
gulp.task('css', () => {
	return gulp.src('./assets/sass/style.scss')
		.pipe(sass())
		.pipe(autoprefixer({
				browsers: ['last 10 versions'],
				cascade: false
		}))
		.pipe(minify())
		.pipe(rename('style.css'))
		.pipe(gulp.dest('./'))
		.pipe(notify('Compile Sass Done!'));
});

//watch
gulp.task('watch', () => {
	gulp.watch('./assets/sass/**', ['css'])
});


gulp.task( 'zip', function() {
	return gulp.src( ['./**/*.*', '!node_modules/**/*.*'] )
		.pipe( zip( 'rovadex-site.zip' ) )
		.pipe( gulp.dest( '.' ) )
} );


gulp.task( 'svg', function() {
	return gulp.src( './assets/svg/*.svg' )
		.pipe( svgmin() )
		.pipe( gulp.dest( './assets/images' ) );
});
