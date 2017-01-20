var ExtractTextPlugin = require("extract-text-webpack-plugin");
var webpack = require("webpack");
var autoprefixer = require("autoprefixer");

module.exports = {
    entry: {
        theme_pleio: "./src/js/pleio.js"
    },
    output: {
        path: "./assets",
        publicPath: "/mod/pleio/assets/",
        filename: "[name].js",
        chunkFilename: "[id].js"
    },
    module: {
        loaders: [
            {
                test: /\.jsx$/,
                loader: 'babel?presets[]=es2015,presets[]=stage-0,presets[]=react'
            },
            {
                test: /\.css$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader!postcss-loader")
            },
            {
                test: /\.less$/,
                loader: ExtractTextPlugin.extract("style-loader", "css-loader!postcss-loader!less-loader")
            },
            {
                test: /\.(ttf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
                loader: 'file-loader'
            }
        ]
    },
    postcss: [ autoprefixer({ browsers: ['last 2 versions'] }) ],
    plugins: [
        new ExtractTextPlugin("[name].css"),
        new webpack.optimize.UglifyJsPlugin({compress: { warnings: false }}),
        new webpack.optimize.DedupePlugin(),
        new webpack.DefinePlugin({
            'process.env': {
                'NODE_ENV': JSON.stringify('production')
            }
        })
    ],
    resolve: {
        extensions: ['', '.js', '.jsx']
    }
}
