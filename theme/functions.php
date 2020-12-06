<?php

/**
 * Mafeah
 *
 * Based on the Jackpine starter theme.
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

use Mafeah\MafeahSite;

new MafeahSite( 'mafeah', '0.11.0', '../dist', '../assets/templates' );
