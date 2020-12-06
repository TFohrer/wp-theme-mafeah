<?php

/**
 * The template for displaying archive pages
 *
 * @package WordPress
 * @subpackage Mafeah
 * @since Mafeah 0.0.1
 */

use Timber\Timber;

$templates = [ 'archive.twig', 'index.twig' ];

$context = Timber::context();

$context['title'] = __( 'Archive', 'mafeah' );

$titlePartial = __( 'Archive for ', 'mafeah' );

if ( is_day() ) {
    $context['title'] = $titlePartial . get_the_date( 'F j, Y' );
}

if ( is_month() ) {
    $context['title'] = $titlePartial . get_the_date( 'F, Y' );
}

if ( is_year() ) {
    $context['title'] = $titlePartial . get_the_date( 'Y' );
}

if ( is_tag() ) {
    $context['title'] = single_tag_title( '', false );
}

if ( is_category() ) {
    $context['title'] = single_cat_title( '', false );
}

if ( is_post_type_archive() ) {
    $context['title'] = post_type_archive_title( '', false );
}

Timber::render( $templates, $context );
