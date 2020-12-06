module.exports = {
    darkMode: 'media',
    purge: [
        'assets/templates/**/*.twig',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
