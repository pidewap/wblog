
<?php

function grab($url){
// Start cURL
       $ip=$_SERVER['REMOTE_ADDR'];
//Geting User IP
		$setUA = 'Opera/9.80 (BlackBerry; Opera Mini/4.5.33868/37.8993; HD; en_US) Presto/2.12.423 Version/12.16';
// User Agent
		$ch = curl_init();
// calling cURL
		curl_setopt($ch, CURLOPT_URL, $url);
// Set URL
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// set return Transfer
		curl_setopt($ch, CURLOPT_REFERER, $url);
// Set HTTP Referer
		curl_setopt($ch, CURLOPT_USERAGENT, $setUA); // Set UA curl_setopt($ch,CURLOPT_HTTPHEADER,array("REMOTE_ADDR:$ip","HTTP_X_FORWARDED_FOR:$ip"));
// Set IP Header
		$ret = curl_exec($ch);
// exec CURL
		curl_close($ch);
// closing cURL
		return $ret;
// Return
	}

$hasil=grab('https://m.youtube.com/?hl=id&gl=ID&client=mv-google');
echo $hasil;
?>
