const path = require('path');
const Encore = require('@symfony/webpack-encore');

Encore
  .setOutputPath('./public')
  .setPublicPath(`/bundles/monofonydemobackend`)
  .setManifestKeyPrefix('bundles/monofonydemobackend')
  .enableSassLoader()
  .addEntry('demo', './assets/js/monofony_demo_backend.js')
  .autoProvidejQuery()
  .configureBabel()
  .disableSingleRuntimeChunk()
  .configureFilenames({
    js: 'js/[name].js',
    css: 'css/[name].css',
  })
  ;

const config = Encore.getWebpackConfig()
config.infrastructureLogging = {
  level: 'warn',
}

config.stats = 'errors-warnings'

module.exports = config