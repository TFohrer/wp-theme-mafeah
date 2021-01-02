module.exports = {
    plugins: [
        require('stylelint'),
        require('tailwindcss'),
        process.env.NODE_ENV === 'production' ? require('autoprefixer') : null,
    ],
}
