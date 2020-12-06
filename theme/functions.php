<?php

/**
 * Mafeah
 *
 * Based on the Mafeah starter theme.
 *
 * @package WordPress
 * @subpackage Mafeah
 * @since Mafeah 0.0.1
 */

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

use Mafeah\MafeahSite;

new MafeahSite( 'mafeah', '0.11.0', '../dist', '../assets/templates' );
