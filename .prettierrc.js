module.exports = {
	...require('@wordpress/prettier-config'),
	plugins: ['./node_modules/prettier-plugin-twig-melody'],
	arrowParens: 'avoid',
	bracketSpacing: true,
	semi: true,
	singleQuote: true,
	trailingComma: 'all',
	printWidth: 100,
	twigPrintWidth: 100,
};
