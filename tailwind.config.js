module.exports = {
    darkMode: 'media',
    purge: ['assets/templates/**/*.twig', 'assets/components/**/*.twig'],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
