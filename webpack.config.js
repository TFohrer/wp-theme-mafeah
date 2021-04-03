const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const { WebpackManifestPlugin } = require('webpack-manifest-plugin');
const { VueLoaderPlugin } = require('vue-loader');
const path = require('path');

// change these variables to fit your project
const jsPath = './assets/js';
const cssPath = './assets/sass';
const outputPath = 'dist';
const localDomain = 'http://mafeah.test';

const manifestSharedSeed = {};

// svelte config
const svelteBuild = {
	entry: { components: './assets/components/index.js' },
	output: {
		filename: 'components.[contenthash].js',
		path: path.resolve(__dirname, outputPath),
		publicPath: '',
	},
	module: {
		rules: [
			{
				test: /\.vue$/,
				loader: 'vue-loader',
			},
		],
	},
	plugins: [new WebpackManifestPlugin({ seed: manifestSharedSeed }), new VueLoaderPlugin()],
	resolve: {
		extensions: ['.ts', '.js', '.vue', '.json'],
		alias: {
			vue: 'vue/dist/vue.esm-bundler.js',
		},
	},
};

// default config
const mainBuild = {
	entry: { main: [jsPath + '/main.js', cssPath + '/main.scss'] },
	output: {
		filename: '[name].[contenthash].js',
		path: path.resolve(__dirname, outputPath),
		//clean: true,
		publicPath: '',
	},
	module: {
		rules: [
			{
				test: /\.s?[c]ss$/,
				exclude: /node_modules/,
				use: [
					{
						loader: MiniCssExtractPlugin.loader,
						options: {
							publicPath: '',
						},
					},
					'css-loader',
					'postcss-loader',
					'sass-loader',
				],
			},
			{
				test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf|svg)$/i,
				use: [
					{
						loader: 'url-loader',
						options: {
							limit: 2048,
						},
					},
				],
			},
		],
	},
	plugins: [
		new MiniCssExtractPlugin({
			filename: '[name].[contenthash].css',
		}),
		new BrowserSyncPlugin(
			{
				proxy: localDomain,
				files: [outputPath + '/*.css'],
				injectCss: true,
			},
			{ reload: true },
		),
		new WebpackManifestPlugin({ seed: manifestSharedSeed }),
	],
};

module.exports = [svelteBuild, mainBuild];
