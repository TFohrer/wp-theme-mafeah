<?php

/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Mafeah
 * @since Mafeah 0.0.1
 */

use Timber\Timber;

$templates = [ 'search.twig', 'archive.twig', 'index.twig' ];

$context = Timber::context();

$context['title'] = sprintf( __( 'Search results for "%s"', 'mafeah' ), get_search_query() );

Timber::render( $templates, $context );
