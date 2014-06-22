<?php
/*
Plugin Name: NoAdblock Nice Message
Plugin URI: https://www.pedroventura.com/wordpress/plugin2
Description: This plugin will shows a friendly message to the user to disable adblock for the current blog.
Version: 0.0.1
Author: Pedro Ventura
Author URI: https://www.pedroventura.com
License: GPL2
*/

add_action( 'plugins_loaded', 'noadblock_load_textdomain' );
add_action( 'wp_enqueue_scripts', 'load_block_adblock_js' );
add_action( 'wp_footer', 'iniciar_app_cookie' );

function load_block_adblock_js() {
	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'nice-ads', plugins_url( '/assets/js/ads.js' , __FILE__ ) );
	wp_enqueue_script( 'nice-message', plugins_url( '/assets/js/nice.message.js' , __FILE__ ) );
	wp_enqueue_script( 'jquery-cookie', plugins_url( '/assets/js/jquery.cookie.js' , __FILE__ ) );
	wp_enqueue_style( 'css-nice-message', plugins_url( '/assets/css/nice.message.css' , __FILE__ ) );
}

function noadblock_load_textdomain() {
	load_plugin_textdomain('noadblock', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}

function iniciar_app_cookie() {
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