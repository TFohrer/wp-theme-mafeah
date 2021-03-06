<?php

namespace Mafeah;

use Timber\Menu;
use Timber\Site;
use Timber\Timber;
use Twig\Environment;

/**
 * Class MafeahSite
 *
 * @package    WordPress
 * @subpackage Mafeah
 * @since      Mafeah 0.0.1
 */
class MafeahSite extends Site {

	protected $manifestFile;

	protected $distPath;

	/**
	 * Timber instance
	 *
	 * @var Timber
	 */
	protected $timberInstance;

	/**
	 *
	 * @param string       $themeName     The name of the application in the wpackio.project.js config.
	 * @param string       $themeVersion  The version of the theme.
	 * @param string       $distPath      The path webpack dist folder.
	 * @param string|array $templatesPath The path to templates folder.
	 */
	public function __construct( string $themeName, string $themeVersion, string $distPath, $templatesPath ) {

		$manifestStr        = file_get_contents( dirname( __FILE__ ) . '/' . $distPath . '/manifest.json' );
		$this->manifestFile = json_decode( $manifestStr, true );
		$this->distPath     = $distPath;

		$this->timberInstance = new Timber();

		Timber::$dirname = $templatesPath;

		$this->add_actions();
		$this->add_filters();
    $this->remove_filters();

		parent::__construct();
	}

	/**
	 * Register our actions.
	 */
	public function add_actions() {
		add_action( 'after_setup_theme', array( $this, 'add_theme_supports' ) );
		add_action( 'after_setup_theme', array( $this, 'load_text_domain' ) );
		add_action( 'init', array( $this, 'add_custom_taxonomies' ) );
		add_action( 'init', array( $this, 'add_custom_post_types' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'load_style_files' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_javascript_files' ) );
	}

	/**
	 * Register our filters.
	 */
	public function add_filters() {
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
	}

	/**
	 * Register custom taxonomies.
	 */
	public function add_custom_taxonomies() {
	}

	/**
	 * Register custom post types.
	 */
	public function add_custom_post_types() {
	}

	/**
	 * Register supported theme features.
	 */
	public function add_theme_supports() {
		// Enable RSS feeds for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress provide the document title.
		add_theme_support( 'title-tag' );

		// Enable featured images for posts.
		add_theme_support( 'post-thumbnails' );

		// Enable HTML5 markup for certain elements.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Enable menus.
		add_theme_support( 'menus' );
	}

	/**
	 * Add variables to the global Timber context.
	 *
	 * @param array $context The global Timber context.
	 *
	 * @return array The modified global Timber context
	 */
	public function add_to_context( array $context ) {
		$context['menu'] = new Menu();
		$context['site'] = $this;

		return $context;
	}

	/**
	 * Add extensions to the Timber Twig environment.
	 *
	 * @param Environment $twig The Timber Twig environment.
	 *
	 * @return Environment The modified Timber Twig environment
	 */
	public function add_to_twig( Environment $twig ) {
		return $twig;
	}

	/**
	 * Load the theme text domain.
	 */
	public function load_text_domain() {
		load_theme_textdomain(
			'mafeah',
			get_template_directory() . '/languages'
		);
	}

  	/**
	 * Load css files.
	 */
	public function load_style_files() {
		$mainCSSFileName = $this->manifestFile['main.css'];
    $mainCSSFilePath = get_stylesheet_directory_uri() . '/' . $this->distPath . '/' . $mainCSSFileName;

		wp_enqueue_style( 'main_css', $mainCSSFilePath );
	}

	/**
	 * Load javascript files.
	 */
	public function load_javascript_files() {
		$mainJSFileName = $this->manifestFile['main.js'];
    $componentsJSFileName = $this->manifestFile['components.js'];

    wp_register_script( 'main_js', get_stylesheet_directory_uri() . '/' . $this->distPath . '/' . $mainJSFileName, null, false, true );
		wp_enqueue_script( 'main_js' );
    wp_register_script( 'components_js', get_stylesheet_directory_uri() . '/' . $this->distPath . '/' . $componentsJSFileName, null, false, true );
		wp_enqueue_script( 'components_js' );
	}

  private function remove_filters() {
    remove_filter( 'the_content', 'wpautop' );
  }
}
