<?php

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );

if ( function_exists( 'get_option_tree') ) {
	$footernewsletteremailaddy = get_option_tree( 'email_newsletter', '', true); 
}

$to = $footernewsletteremailaddy; 

$name = trim($_POST['name']);
$email = trim($_POST['email']);

$body = "<html><head><title>New Newsletter Subscription</title></head><body><br>";
$body .= "Name: <b>" . $name . "</b><br>";
$body .= "Email: <b>" . $email . "</b><br>";
$body .= "<br></body></html>";
	
$subject = 'New Newsletter Subscription: ' . $name;
$header = "From: $to\n" . "MIME-Version: 1.0\n" . "Content-type: text/html; charset=utf-8\n";

mail($to, $subject, $body, $header);

?>