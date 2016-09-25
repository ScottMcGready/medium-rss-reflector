<?php
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

function get_remote_feed($path){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$path);
	curl_setopt($ch, CURLOPT_FAILONERROR,1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	$retValue = curl_exec($ch);			 
	curl_close($ch);
	return $retValue;
}

function check_url_is_valid($url_to_check){
	if(!filter_var($url, FILTER_VALIDATE_URL) === true){
		echo "That's not a valid URL. Did you remember to include 'http://' or 'https://' at the start of the URL?";
		exit;
	}
}

function return_new_rss_feed($url){
	$xml = get_remote_feed($url);
	$xml = preg_replace('/(<img src="https:\/\/medium\.com\/_\/stat)(.)*(]]>)/', ']]>', $xml);
	header('Content-Type: text/xml');
	echo $xml;
}

if($_GET['url'] != NULL && $_GET['url'] != ''){
	$_ENV['DEFAULT_URL'] = $_GET['url'];
}

// Check if the URL is valid...
check_url_is_valid($_ENV['DEFAULT_URL']);

// Return the new RSS feed
return_new_rss_feed($_ENV['DEFAULT_URL']);

?>