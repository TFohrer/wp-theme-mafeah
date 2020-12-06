<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

use Timber\Timber;

$templates = [ 'index.twig' ];

if ( is_home() ) {
    // Push special home template to the front of the array
    array_unshift( $templates, 'home.twig' );
}

Timber::render( $templates, Timber::context() );
