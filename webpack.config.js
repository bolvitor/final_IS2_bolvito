const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
module.exports = {
  mode: 'development',
  watch: true,
  entry: {
    'js/app' : './src/js/app.js',
    'js/inicio' : './src/js/inicio.js',
    'js/puestos/index' : './src/js/puestos/index.js',
    'js/areas/index' : './src/js/areas/index.js',
    'js/empleados/index' : './src/js/empleados/index.js',
    'js/asignaciones/index' : './src/js/asignaciones/index.js',
    'js/organizaciones/index' : './src/js/organizaciones/index.js',
   
   
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'public/build')
  },
  plugins: [
    new MiniCssExtractPlugin({
        filename: 'styles.css'
    })
  ],
  module: {
    rules: [
      {
        test: /\.(c|sc|sa)ss$/,
        use: [
            {
                loader: MiniCssExtractPlugin.loader
            },
            'css-loader',
            'sass-loader'
        ]
      },
      {
        test: /\.(png|svg|jpg|gif)$/,
        loader: 'file-loader',
        options: {
           name: 'img/[name].[hash:7].[ext]'
        }
      },
    ]
  }
};