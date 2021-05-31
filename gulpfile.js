var gulp           = require('gulp'),
		gutil          = require('gulp-util' ),
		babel 				 = require('gulp-babel'),
		sass           = require('gulp-sass'),
		browserSync    = require('browser-sync'),
		concat         = require('gulp-concat'),
		uglify         = require('gulp-uglify'),
		cleanCSS       = require('gulp-clean-css'),
		rename         = require('gulp-rename'),
		del            = require('del'),
		imagemin       = require('gulp-imagemin'),
		cache          = require('gulp-cache'),
		autoprefixer   = require('gulp-autoprefixer'),
		ftp            = require('vinyl-ftp'),
		notify         = require("gulp-notify");

// Скрипты проекта

gulp.task('common-js', function() {
	return gulp.src([
		'vladgzeta-new/js/common.js',
		])
		.pipe(babel({
			presets: ['@babel/preset-env']
		}))
	.pipe(concat('common.min.js'))
	
	.pipe(uglify())
	.pipe(gulp.dest('vladgzeta-new/js'));
});

gulp.task('js', ['common-js'], function() {
	return gulp.src([
		'vladgzeta-new/libs/jquery/jquery.min.js',
		'vladgzeta-new/libs/slick/slick.min.js',
		'vladgzeta-new/libs/lightbox/lightbox-plus-jquery.min.js',
		'vladgzeta-new/libs/owl.carousel/owl.carousel.min.js',
		'vladgzeta-new/libs/search/classie.min.js',
		'vladgzeta-new/libs/search/uisearch.min.js',
		'vladgzeta-new/libs/jquery.formstyler/jquery.customSelect.min.js',
		'vladgzeta-new/libs/perfect.scroll/jquery.mCustomScrollbar.concat.min.js',
		'vladgzeta-new/libs/mmenu/jquery.mmenu.all.min.js',
		// 'vladgzeta-new/js/common.min.js', // Всегда в конце
		])
		.pipe(concat('scripts.min.js'))
		// .pipe(uglify()) // Минимизировать весь js (на выбор)
		.pipe(gulp.dest('vladgzeta-new/js'))
		.pipe(browserSync.reload({stream: true}));
});

gulp.task('browser-sync', function() {
	browserSync({
		proxy: 'vladgazeta.rg',
		notify: false,
		// tunnel: true,
		// tunnel: "projectmane", //Demonstration page: http://projectmane.localtunnel.me
	});
});

gulp.task('sass', function() {
	return gulp.src('vladgzeta-new/sass/**/*.sass')
	.pipe(sass({outputStyle: 'expand'}).on("error", notify.onError()))
	.pipe(rename({suffix: '.min', prefix : ''}))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleanCSS()) // Опционально, закомментировать при отладке
	.pipe(gulp.dest('vladgzeta-new/css'))
	.pipe(browserSync.reload({stream: true}));
});

gulp.task('watch', ['sass', 'js', 'browser-sync'], function() {
	gulp.watch('vladgzeta-new/sass/**/*.sass', ['sass']);
	gulp.watch(['libs/**/*.js', 'vladgzeta-new/js/common.js'], ['js']);
	gulp.watch('vladgzeta-new/**/*.php', browserSync.reload);
});

gulp.task('imagemin', function() {
	return gulp.src('vladgzeta-new/img/**/*')
	.pipe(cache(imagemin()))
	.pipe(gulp.dest('dist/img'));
});

gulp.task('build', ['removedist', 'imagemin', 'sass', 'js'], function() {

	var buildFiles = gulp.src([
		'vladgzeta-new/*.html',
		'vladgzeta-new/.htaccess',
		]).pipe(gulp.dest('dist'));

	var buildCss = gulp.src([
		'vladgzeta-new/css/main.min.css',
		]).pipe(gulp.dest('dist/css'));

	var buildJs = gulp.src([
		'vladgzeta-new/js/scripts.min.js',
		]).pipe(gulp.dest('dist/js'));

	var buildFonts = gulp.src([
		'vladgzeta-new/fonts/**/*',
		]).pipe(gulp.dest('dist/fonts'));

});

gulp.task('deploy', function() {

	var conn = ftp.create({
		host:      'hostname.com',
		user:      'username',
		password:  'userpassword',
		parallel:  10,
		log: gutil.log
	});

	var globs = [
	'dist/**',
	'dist/.htaccess',
	];
	return gulp.src(globs, {buffer: false})
	.pipe(conn.dest('/path/to/folder/on/server'));

});

gulp.task('removedist', function() { return del.sync('dist'); });
gulp.task('clearcache', function () { return cache.clearAll(); });

gulp.task('default', ['watch']);
