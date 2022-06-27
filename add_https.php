<?php

// This code works on WordPress 7.4.
// This function adds the 'https' protocol to all the URLs that link to the home page of the website. It only makes changes in the_content() function.

function add_https_protocol( $location ) {
	$remove_https = Array(
	'https://' => '',
	);
	$the_site_url = get_site_url();
	$replacedText = str_replace(array_keys($remove_https), $remove_https, $the_site_url);
	$replace = array(
	'<a href="'.'http://www.'."$replacedText".'"' =>'<a href="'.'https://'."$replacedText".'"',
	'<a href="'.'http://'."$replacedText".'"' =>'<a href="'.'https://'."$replacedText".'"',
	);
	$location = str_replace( array_keys($replace), 
	$replace, $location );
		return $location;
}
add_filter( 'the_content', 'add_https_protocol' );

?>
