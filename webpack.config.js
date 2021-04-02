const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const { WebpackManifestPlugin } = require('webpack-manifest-plugin')

var path = require('path')

// change these variables to fit your project
const jsPath = './assets/js'
const cssPath = './assets/sass'
const outputPath = 'dist'
const localDomain = 'http://mafeah.test'

module.exports = {
  entry: [jsPath + '/main.js', cssPath + '/main.scss'],
  output: {
    filename: '[name].[contenthash].js',
    path: path.resolve(__dirname, outputPath),
    clean: true,
    publicPath: '',
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
      { reload: false },
    ),
    new WebpackManifestPlugin(),
  ],
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
        use: 'url-loader?limit=1024',
      },
    ],
  },
}
