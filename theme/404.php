<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Mafeah
 * @since Mafeah 0.0.1
 */

use Timber\Timber;

Timber::render( '404.twig', Timber::context() );
