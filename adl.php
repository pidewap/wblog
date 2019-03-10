<?php 
    $url = 'https://www.saveoffline.com/process/?url=https://www.youtube.com/watch?v='.$_GET['id'].'&type=json';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($curl);

$jsob=json_decode($data);
foreach ($jsob->urls as $item)
{
    if($_GET['type'] == 'mp4'){
if($item->label == '360p - mp4')
    {
  $urld = $item->id;
    }
}

if($_GET['type'] == 'm4a'){
if($item->label == '(audio - no video) m4a (128 kbps)')
{
$urld = $item->id;
}
}
}


function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

Redirect(''.$urld.'', false);
?>
 
