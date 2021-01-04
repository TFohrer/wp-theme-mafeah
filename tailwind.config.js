module.exports = {
    theme: {
        colors: {
            primary: '#b79c7d',
        },
    },
    darkMode: 'media',
    purge: ['assets/templates/**/*.twig', 'assets/components/**/*.twig'],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
