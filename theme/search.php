<?php

/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

use Timber\Timber;

$templates = [ 'search.twig', 'archive.twig', 'index.twig' ];

$context = Timber::context();

$context['title'] = sprintf( __( 'Search results for "%s"', 'jackpine' ), get_search_query() );

Timber::render( $templates, $context );
