
<?php

function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'NokiaC3-01/5.0 (06.05) Profile/MIDP-2.1 Configuration/CLDC-1.1 Opera/9.60 (J2ME/MIDP;Opera Mini/4.2.13337Mod.by.Dante./503; U; en)Presto/2.2.0 UNTRUSTED/1.0');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
}

$profile = http_request("https://m.youtube.com");

// ubah string JSON menjadi array
$profilee = json_decode($profile, TRUE);
echo $profile;
?>
