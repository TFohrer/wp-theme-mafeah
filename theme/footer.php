<?php

/**
 * The template for displaying the footer
 *
 * Third party plugins that hijack the theme will call wp_footer() to get the footer template.
 * We use this to end our output buffer (started in header.php) and render into the template.
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

use Timber\Timber;

$context = Timber::context();

$context['content'] = ob_get_contents();

ob_end_clean();

Timber::render( 'plugin.twig', $context );
