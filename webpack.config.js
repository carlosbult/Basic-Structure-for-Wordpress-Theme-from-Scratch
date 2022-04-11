const path = require('path');

/* Plugins */
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const ESlintPlugin = require('eslint-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const localDomain = 'http://localhost/your_theme_name/';

/* Path Variables */
const scssPath = './assets/sass/style.scss';
const jsPath = './assets/js/app.js';
const cssPath = './assets/dist/style.css';

module.exports = {
  watch: true,
  entry: {
    style: {
      import: scssPath,
      filename: '[name].css',
    },
    app: {
      import: jsPath,
      filename: '[name].js',
    },
  },
  output: {
    filename: '[name]',
    path: path.resolve(__dirname, './assets/dist'),
  },
  module: {
    rules: [
      {
        test: /\.scss$/i,
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
          },
          'css-loader',
          'sass-loader',
        ],
      },
      {
        test: /\.js$/i,
        exclude: /node_modules/,
        use: [
          {
            loader: 'babel-loader',
          },
        ],
      },
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].min.css',
    }),
    new ESlintPlugin({
      files: ['**/*.js'],
    }),

    /* Actived this plugin is you want live css reload */
    new BrowserSyncPlugin(
      {
        proxy: localDomain,
        files: [cssPath],
        injectCss: true,
      },
      {
        reload: false,
      }
    ),
  ],
};
