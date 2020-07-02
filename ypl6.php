<?php
error_reporting(0);
function maling($content,$start,$end){
if($content && $start && $end) {
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];
}
return '';
}
}
$uar=array('Nokia2610/2.0 (07.04a) Profile/MIDP-2.0 Configuration/CLDC-1.1 UP.Link/6.3.1.20.0','Nokia5300/2.0 (05.51) Profile/MIDP-2.0 Configuration/CLDC-1.1','Nokia6030/2.0 (y3.44) Profile/MIDP-2.0 Configuration/CLDC-1.1','NokiaN70-1/5.0616.2.0.3 Series60/2.8 Profile/MIDP-2.0 Configuration/CLDC-1.1');
$uarr=array_rand($uar);
$uarand=$uar[$uarr];

if(!empty($_GET['url'])){
  $urr=$_GET['url'];
}else{
  $urr='https://go-lagu.com/cari?q=bts';
}


$f=file(''.$urr.'');
$gg=@implode($f);
$bod=maling($gg, '<body', '</html>');
$hasil=explode('<div class="go-archive media">',$bod);
$hasil=explode('</a>',$hasil[1]);
$hasil=explode('<a',$hasil[0]);
   for($i=1;$i<count($hasil);$i++){
      $link=explode('/download-lagu-',$hasil[$i]);
$link=explode('/',$link[1]);
$link=$link[0];
     echo ''.$i.'. '.$link.'<br>';
      }
  
?>
