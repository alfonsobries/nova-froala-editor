var webpack = require('webpack')
let mix = require('laravel-mix')

mix.js('resources/js/field.js', 'dist/js')
   	.sass('resources/sass/field.scss', 'dist/css')
   	.copyDirectory('node_modules/font-awesome/fonts', 'dist/fonts/font-awesome')
    .webpackConfig({
        resolve: {
            symlinks: false
        },
        plugins: [
			    // Jquery loader plugin.
			    new webpack.ProvidePlugin({
			      $: "jquery",
			      jQuery: "jquery"
			    })
			  ]
    })
    .options({
    	processCssUrls: false
    })
