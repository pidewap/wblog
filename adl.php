<?php 
$json_url = 'https://www.saveoffline.com/process/?url=https://www.youtube.com/watch?v='.$_GET['id'].'&type=json';
$json = file_get_contents($json_url);
$data = json_decode($json, TRUE);

if($_GET['type'] == '720'){
  $url = $data[urls][0][id];
}
if($_GET['type'] == '360p'){
  $url = $data[urls][1][id];
}
if($_GET['type'] == '360w'){
  $url = $data[urls][2][id];
}
if($_GET['type'] == '240p'){
  $url = $data[urls][3][id];
}
if($_GET['type'] == '144p'){
  $url = $data[urls][4][id];
}
header(Location: '.$url.');
exit();
?>
