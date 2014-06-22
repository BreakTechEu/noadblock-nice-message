<?php
/*
Plugin Name: NoAdblock Nice Message
Plugin URI: http://pedroventura.es/TjVFZ6
Description: This plugin shows a friendly message to the users with any adblock extension on their browser. The plugin just suggests to disable the adblock for your blog with a flyout box.
Version: 1.0.0
Author: Pedro Ventura
Author URI: https://www.pedroventura.com
License: GPL2
*/

add_action( 'plugins_loaded', 'load_translations' );
add_action( 'wp_enqueue_scripts', 'load_assets' );
add_action( 'wp_footer', 'start_plugin' );

/**
 * load_assets
 * 
 * @access public
 *
 * @return mixed Value.
 */
function load_assets() {
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'nice-ads', plugins_url( '/assets/js/ads.js' , __FILE__ ) );
	wp_enqueue_script( 'nice-message', plugins_url( '/assets/js/nice.message.js' , __FILE__ ) );
	wp_enqueue_script( 'jquery-cookie', plugins_url( '/assets/js/jquery.cookie.js' , __FILE__ ) );
	wp_enqueue_style( 'css-nice-message', plugins_url( '/assets/css/nice.message.css' , __FILE__ ) );
}

/**
 * load_translations
 * 
 * @access public
 *
 * @return mixed Value.
 */
function load_translations() {
	load_plugin_textdomain('noadblock', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}

/**
 * start_plugin
 * 
 * @access public
 *
 * @return mixed Value.
 */
function start_plugin() {
	$title =  __('Adblock is actived!', 'noadblock');
	$message =  __('This blog helps you to solve your doubts and keeps you informed. <br />Please,<b> consider to disable the adblock <u>in this site</u></b>!<br /> Thank You!', 'noadblock');
	?>
	<script type="text/javascript">
		var niceMessageSetup = { "text": [
			{ "title": "<?php echo $title;?>", "message": "<?php echo $message;?>" }
		]};
	</script>
<?php 
}