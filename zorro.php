<?php
/*
Plugin Name: Zorro - WordPress
Plugin URI: https://www.tricd.de/zorro/
Description: Checks the health of your WordPress install
Author: Tobias Redmann
Version: 0.2
Author URI: https://www.tricd.de
Text Domain: zorro
*/

class Zorro{

	/**
	 * Will return an empty string in order to remove WordPress Version from RSS Feed
	 *
	 * @return string
	 */
	static function removeWordPressVersionFromRSS()
	{
		return '';
	}

	/**
	 * Removes the ver Parameter from Stylesheet and JS Urls
	 *
	 * @param $url
	 *
	 * @return mixed
	 */
	function removeCssAndJsParameter($url)
	{
		if (strpos( $url, 'ver=')) {
			$url = remove_query_arg('ver', $url);
		}

		return $url;

	}

	/**
	 * Removes some parameters from WordPress http response header
	 *
	 * @param $headers
	 *
	 * @return mixed
	 */
	function modifyHeader($headers)
	{

        $headersToRemove = array(
            'X-Pingback',
            'WP-Super-Cache',
            'X-Powered-By'
        );


        foreach($headersToRemove as $headerToRemove) {

            // try wordpress function
            if (isset($headers[$headerToRemove])) {
                unset($headers[$headerToRemove]);
            }

            // the remove function was not enabled in < 5.3
            if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
                header_remove($headerToRemove);
            } else {
                header($headerToRemove.':');
            }
        }

		// add information
		$headers['X-Frame-Options'] = 'SAMEORIGIN';

		return $headers;

	}


}


remove_action('wp_head', 'wp_generator');

add_filter('the_generator', array('Zorro', 'removeWordPressVersionFromRSS'));
add_filter('style_loader_src', array('Zorro', 'removeCssAndJsParameter'), 9999);
add_filter('script_loader_src', array('Zorro', 'removeCssAndJsParameter'), 9999);
add_filter('wp_headers', array('Zorro', 'modifyHeader'), 9999);

// add_filter('xmlrpc_enabled', '__return_false' );
add_filter('login_errors', create_function('$a', "return null;"));