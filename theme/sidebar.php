<?php

/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Mafeah
 * @since Mafeah 0.0.1
 */

use Timber\Timber;

Timber::render( 'sidebar.twig', Timber::context() );
