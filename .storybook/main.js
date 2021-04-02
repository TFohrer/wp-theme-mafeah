const path = require('path')

module.exports = {
  stories: ['../assets/**/*.stories.@(js|mdx)'],
  addons: ['@storybook/addon-essentials', '@storybook/addon-controls'],
  webpackFinal: async (config, { configType }) => {
    config.module.rules.push({
      test: /\.twig$/,
      use: [
        {
          loader: 'twig-loader',
        },
      ],
    })

    config.module.rules.push({
      test: /\.(scss|css)$/,
      use: ['style-loader', 'css-loader', 'postcss-loader', 'sass-loader'],
      include: path.resolve(__dirname, '../assets'),
    })

    return config
  },
}
