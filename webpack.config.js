const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const localDomain = 'http://localhost/carlos_bult/';

const cssPath = './assets/sass/style.scss';
const indexJsPath = './assets/js/index.js';

module.exports = {
  watch: true,
  entry: {
    style: {
        import : cssPath,
        filename: '[name].css',
    },
    app: {
        import : indexJsPath,
        filename: '[name].js',
    }
  },
  output: {
    filename: '[name]',
    path: path.resolve(__dirname, 'dist'),
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
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].min.css',
    }),
    /* Actived this plugin is you want live css reload */
    // new BrowserSyncPlugin(
    //   {
    //     proxy: localDomain,
    //     files: [cssPath + '/*.css'],
    //     injectCss: true,
    //   },
    //   {
    //     reload: false,
    //   }
    // ),
  ],
};


