var mix = require('laravel-mix');
		mix.setPublicPath('.');

var spritemap = require('svg-spritemap-webpack-plugin');

// const spriteLoaderPlugin = require('svg-sprite-loader/plugin');

// Autoload jQuery
// @see: https://github.com/JeffreyWay/laravel-mix/blob/master/docs/autoloading.md
// mix.autoload({
// 	jquery: ['$', 'window.jQuery']
// });

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.js('typo3conf/ext/play/Resources/Public/Js/application.js', 'fileadmin/Resources/Public/Js')
 	.sass('typo3conf/ext/play/Resources/Public/Sass/application.scss', 'fileadmin/Resources/Public/Css')
	.webpackConfig({
		plugins: [
			new spritemap({
				src: 'typo3conf/ext/play/Resources/Public/Svg/Sprite/*.svg',
				filename: 'fileadmin/Resources/Public/Svg/spritemap.svg',
				svgo: false
			})
		]
	});;