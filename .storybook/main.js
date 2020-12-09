const path = require('path')

module.exports = {
    stories: ['../assets/components/**/*.stories.@(js|mdx)'],
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
            test: /\.scss$/,
            use: [
                'style-loader',
                'css-loader',
                'sass-loader',
                'postcss-loader',
            ],
            include: path.resolve(__dirname, '../'),
        })
        return config
    },
}
