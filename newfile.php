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

ini_set('default_charset',"UTF-8");
ini_set('user_agent',$uarand."\r\naccept: text/html, application/xml;q=0.9, application/xhtml+xml, image/png, image/jpeg, image/gif, image/x-xbitmap, */*;q=0.1\r\naccept_charset: $_SERVER[HTTP_ACCEPT_CHARSET]\r\naccept_language: bahasa");

if(!empty($_GET['page'])){
$pages='/page/'.$_GET['page'].'';
}else{
  $pages='/';
}

if(!empty($_GET['url'])){
  $urr=$_GET['url'];
}else{
  $urr='https://go-lagu.com'.$pages.'';
}


$f=file(''.$urr.'');
$gg=@implode($f);

$bod=maling($gg, '<body>', '</body>');
$bod=str_replace('/page/', '?page=', $bod);
$bod=str_replace('/download/', '?url=https://go-lagu.com/download/', $bod);
if(!empty($_GET['url'])){
  
  $linkdownload=maling($bod, '<br /><br />', '</div>');
  
$linkart=maling($bod, 'src="https://img.go-lagu.com/', '-');
  $linkt=maling($bod, 'alt="', '"');
echo ' <form method="post" action="http://downloadlagu20.com/status">Support BBCODE:<br/>
judul : <br/><input type="text" name="judul" value="'.$linkt.'">
<br>videoid: <br><input type="text" name="videoid" value="'.$linkart.'">
<br/>content: <br><textarea name="nd">'.$linkdownload.'</textarea><br/>
<select name="videocat">
  <option id="cat" value="indo">indo</option>
<option id="cat" value="kpop">kpop</option>
<option id="cat" value="barat">barat</option>
<option id="cat" value="dangdut">dangdut</option>
<option id="cat" value="cover">cover</option>
</select><br><br><input type="submit" name="submit" value="Post"></form>

';
}else{
echo strip_tags($bod, '<a><img><div><br>');
}
?>
