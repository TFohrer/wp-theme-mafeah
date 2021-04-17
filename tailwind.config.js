// TODO switch to css vars that are set in wordpress customizer
module.exports = {
	theme: {
		colors: {
			primary: {
				DEFAULT: '#b79c7d',
			},
			secondary: {
				DEFAULT: '#404C35',
			},
			grey: {
				dark: '#3c4858',
				DEFAULT: '#ededed',
			},
		},
		spacing: {
			x1: '4px',
			x2: '8px',
			x3: '12px',
			x4: '16px',
			x5: '20px',
		},
	},
	darkMode: 'media',
	purge: ['assets/templates/**/*.twig', 'assets/components/**/*.twig'],
	plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
