let preprocessor = 'sass', // Preprocessor (sass, less, styl); 'sass' also work with the Scss syntax in blocks/ folder.
		fileswatch   = 'php,html,htm,txt,json,md,woff2' // List of files extensions for watching & hard reload
		basePath = 'vladgazeta/'

const { src, dest, parallel, series, watch } = require('gulp')
const browserSync  = require('browser-sync').create()
const bssi         = require('browsersync-ssi')
const ssi          = require('ssi')
const webpack      = require('webpack-stream')
const sass         = require('gulp-sass')
const sassglob     = require('gulp-sass-glob')
const less         = require('gulp-less')
const lessglob     = require('gulp-less-glob')
const styl         = require('gulp-stylus')
const stylglob     = require("gulp-noop")
const cleancss     = require('gulp-clean-css')
const autoprefixer = require('gulp-autoprefixer')
const rename       = require('gulp-rename')
const imagemin     = require('gulp-imagemin')
const newer        = require('gulp-newer')
const rsync        = require('gulp-rsync')
const del          = require('del')

function browsersync() {
	browserSync.init({
		// server: {
		// 	baseDir: basePath,
		// 	middleware: bssi({ baseDir: `${basePath}`, ext: '.html' })
		// },
		proxy: {
			target: "http://vladgazeta.rg/",
		},
		// ghostMode: { clicks: false },
		notify: false,
		online: true,
		// tunnel: 'pitnic.rg', // Attempt to use the URL https://yousutename.loca.lt
	})
}

function scripts() {
	return src([`${basePath}js/*.js`, `!${basePath}js/*.min.js`])
		.pipe(webpack({
			mode: 'production',
			performance: { hints: false },
			module: {
				rules: [
					{
						test: /\.(js)$/,
						exclude: /(node_modules)/,
						loader: 'babel-loader',
						query: {
							presets: ['@babel/env'],
							plugins: ['babel-plugin-root-import']
						}
					}
				]
			}
		})).on('error', function handleError() {
			this.emit('end')
		})
		.pipe(rename('app.min.js'))
		.pipe(dest(`${basePath}js`))
		.pipe(browserSync.stream())
}

function styles() {
	return src([`${basePath}styles/${preprocessor}/*.*`, `!${basePath}styles/${preprocessor}/_*.*`])
		.pipe(eval(`${preprocessor}glob`)())
		.pipe(eval(preprocessor)())
		.pipe(autoprefixer({ overrideBrowserslist: ['last 10 versions'], grid: true }))
		.pipe(cleancss({ level: { 1: { specialComments: 0 } },/* format: 'beautify' */ }))
		.pipe(rename({ suffix: ".min" }))
		.pipe(dest(`${basePath}css`))
		.pipe(browserSync.stream())
}

function images() {
	return src([`${basePath}images/src/**/*`])
		.pipe(newer(`${basePath}images/dist`))
		.pipe(imagemin())
		.pipe(dest(`${basePath}images/dist`))
		.pipe(browserSync.stream())
}

function buildcopy() {
	return src([
		`{${basePath}js,${basePath}css}/*.min.*`,
		`${basePath}images/**/*.*`,
		`!${basePath}images/src/**/*`,
		`${basePath}fonts/**/*`
	], { base: `${basePath}` })
	.pipe(dest('dist'))
}

async function buildhtml() {
	let includes = new ssi(`${basePath}', 'dist/', '/**/*.html`)
	includes.compile()
	del('dist/parts', { force: true })
}

function cleandist() {
	return del('dist/**/*', { force: true })
}

function deploy() {
	return src('dist/')
		.pipe(rsync({
			root: 'dist/',
			hostname: 'username@yousite.com',
			destination: 'yousite/public_html/',
			// clean: true, // Mirror copy with file deletion
			include: [/* '*.htaccess' */], // Included files to deploy,
			exclude: [ '**/Thumbs.db', '**/*.DS_Store' ],
			recursive: true,
			archive: true,
			silent: false,
			compress: true
		}))
}

function startwatch() {
	watch(`${basePath}styles/${preprocessor}/**/*`, { usePolling: true }, styles)
	watch([`${basePath}js/**/*.js`, `!${basePath}js/**/*.min.js`], { usePolling: true }, scripts)
	watch(`${basePath}images/src/**/*.{jpg,jpeg,png,webp,svg,gif}`, { usePolling: true }, images)
	watch(`${basePath}**/*.{${fileswatch}}`, { usePolling: true }).on('change', browserSync.reload)
}

exports.scripts = scripts
exports.styles  = styles
exports.images  = images
exports.deploy  = deploy
exports.assets  = series(scripts, styles, images)
exports.build   = series(cleandist, scripts, styles, images, buildcopy, buildhtml)
exports.default = series(scripts, styles, images, parallel(browsersync, startwatch))