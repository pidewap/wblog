<?php 
$json_url = 'https://www.saveoffline.com/process/?url=https://www.youtube.com/watch?v='.$_GET['id'].'&type=json';
$json = file_get_contents($json_url);
$data = json_decode($json, TRUE);
echo '<pre>';
print_r($data);
echo '720p - mp4 = '.$data[urls][0][id].'';
echo '360p - mp4 = '.$data[urls][1][id].'';
echo '360p - webm = '.$data[urls][2][id].'';
echo '240p - 3gp = '.$data[urls][3][id].'';
echo '144p - 3gp = '.$data[urls][4][id].'';
echo '</pre>';
?>
