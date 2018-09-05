<?php 
function xrvel_curl($url) { 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
    curl_setopt($ch, CURLOPT_HEADER, false); 
    @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
    @curl_setopt($ch, CURLOPT_MAXREDIRS, 2); 
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6'); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__).'/cookie.txt'); 
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__).'/cookie.txt'); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_REFERER, $url); 
    $res = trim(curl_exec($ch)); 
    curl_close($ch); 
    unset($ch); 
    return $res; 
} 

function my_get_google_hot_trend($country_code) { 
    $result = array( 
        'data' => array(), 
        'error' => '' 
    ); 

    $res = xrvel_curl('http://www.google.com/trends/hottrends/widget?pn='.$country_code.'&tn=50&h=413'); 

    if ($res == '') { 
        $result['error'] = 'Failed. Empty response.'; 
        return $result; 
    } 

    if (!preg_match_all("/\<span class='widget-title-in-list'\>(.*)\<\/span\>\<\/span\>\<span class='widget-list-more-arrow/siU", $res, $match)) { 
        $result['error'] = 'Failed to parse.'; 
        return $result; 
    } 

    $keywords = $match[1]; 

    $result['data'] = $keywords; 
    return $result; 
} 

$keyword = my_get_google_hot_trend('p19'); 

echo '<textarea>{% set topsearch = {
';
foreach ($keyword['data'] as &$value) {
    $n=rand(0,100000);
echo ''.$n.': {title: "'.str_replace(',','',str_replace('"','',$value)).'"},
';
}
echo '
} %}</textarea>';
?>
