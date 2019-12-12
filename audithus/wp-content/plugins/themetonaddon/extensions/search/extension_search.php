<?php
class ReduxFramework_Extension_search {

	static $version = "1.0.1";

	// Protected vars
	protected $parent;

	public function __construct( $parent ) {

		$this->parent = $parent;
		if ( empty( $this->extension_dir ) ) {
			$this->extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
			$this->extension_url = site_url( str_replace( trailingslashit( str_replace( '\\', '/', ABSPATH ) ), '', $this->extension_dir ) );
		}

		// Allow users to extend if they want
		do_action('redux/search/'.$parent->args['opt_name'].'/construct');

		global $pagenow;
		if ( isset( $_GET['page'] ) && $_GET['page'] && $_GET['page'] == $this->parent->args['page_slug'] )  {
			add_action( 'admin_enqueue_scripts', array( $this, '_enqueue' ), 0 );
		}

		add_action( "redux/metaboxes/{$this->parent->args['opt_name']}/enqueue", array( $this, '_enqueue' ), 10 );

	}
	

	function _enqueue() {

		/**
		 * Redux search CSS
		 * filter 'redux/page/{opt_name}/enqueue/redux-extension-search-css'
		 * @param string  bundled stylesheet src
		 */
		wp_enqueue_style(
			'redux-extension-search-css',
			$this->extension_url . 'extension_search.css',
			time(),
			true
		);
		
		$min = Redux_Functions::isMin();
		
			wp_enqueue_script(
				'redux-extension-search-js',
				$this->extension_url . '/extension_search.js',
				array( 'jquery' ),
				time(),
				true
			);
		
		// Values used by the javascript
		wp_localize_script(
				'redux-extension-search-js',
				'reduxsearch',
				__('Search for option(s)', 'themetonaddon')
		);

	}

} // class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class/ class