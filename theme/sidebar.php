<?php

/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

use Timber\Timber;

Timber::render( 'sidebar.twig', Timber::context() );
