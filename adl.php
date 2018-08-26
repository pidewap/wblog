<?php 
$json_url = 'https://www.saveoffline.com/process/?url=https://www.youtube.com/watch?v=msDPN34kHiQ&type=json';
$json = file_get_contents($json_url);
$data = json_decode($json, TRUE);
echo '<pre>';
print_r($data);
echo '720 = '.$data[urls][0][id].'';
echo '</pre>';
?>
