const Encore = require('@symfony/webpack-encore');

Encore
    .setOutputPath('public/build/')
    .setPublicPath('/build')
    .addEntry('app', './assets/app.js')
    .enableSingleRuntimeChunk()
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    .enableVersioning(Encore.isProduction())
    .enableReactPreset() // Enable React preset
    .enableSassLoader() // Enable Sass loader
    .addAliases({
        '@symfony/stimulus-bridge/controllers.json': './assets/controllers/controllers.json'
    })
;

module.exports = Encore.getWebpackConfig();
