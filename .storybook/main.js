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
        return config
    },
}
