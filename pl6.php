<?php
                  function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
$string = str_replace('&', '', $string);
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
$content=file_get_contents('https://rss.itunes.apple.com/api/v1/id/apple-music/new-releases/all/100/explicit.json'); 
$top_albums=json_decode($content);
$tracks = $top_albums->feed->results;
echo '{% set indob = {
';
foreach( $tracks as $track ) {
$img = $track->artworkUrl100;
  $title = $track->name;
  $artist = $track->artistName;
  $date = $track->releaseDate;
  $adate=date('j F Y', strtotime($date));
  $cat = $track->genres[0]->name;
 
$n=rand(0,100000);
echo ''.$n.': {url:"'.clean($artist).'-'.clean($title).'", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'", date: "'.$adate.'", cat: "'.$cat.'"},
';
}
echo '
} %}';
?>
{% block indobaru %}
{% endblock %}

<?php

$tcontent=file_get_contents('https://rss.itunes.apple.com/api/v1/id/itunes-music/top-songs/all/100/explicit.json'); 
$ttop_albums=json_decode($tcontent);
$ttracks = $ttop_albums->feed->results;
echo '{% set indot = {
';
foreach( $ttracks as $ttrack ) {
$timg = $ttrack->artworkUrl100;
  $ttitle = $ttrack->name;
  $tartist = $ttrack->artistName;
  $tdate = $ttrack->releaseDate;
  $tadate=date('j F Y', strtotime($tdate));
  $tcat = $ttrack->genres[0]->name;
 
$n=rand(0,100000);
echo ''.$n.': {url:"'.clean($tartist).'-'.clean($ttitle).'", title: "'.str_replace(',','',str_replace('"','',$ttitle)).'", artist: "'.str_replace(',','',str_replace('"','',$tartist)).'", img: "'.$timg.'", date: "'.$tadate.'", cat: "'.$tcat.'"},
';
}
echo '
} %}';
?>
{% block indotop %}
{% endblock %}

<?php
$kcontent=file_get_contents('https://rss.itunes.apple.com/api/v1/kr/apple-music/top-songs/all/100/explicit.json'); 
$ktop_albums=json_decode($kcontent);
$ktracks = $ktop_albums->feed->results;
echo '{% set kpop = {
';
foreach( $ktracks as $ktrack ) {
$kimg = $ktrack->artworkUrl100;
  $ktitle = $ktrack->name;
  $kartist = $ktrack->artistName;
  $kdate = $ktrack->releaseDate;
  $kadate=date('j F Y', strtotime($kdate));
  $kcat = $ktrack->genres[0]->name;
 
$n=rand(0,100000);
echo ''.$n.': {url:"'.clean($kartist).'-'.clean($ktitle).'", title: "'.str_replace(',','',str_replace('"','',$ktitle)).'", artist: "'.str_replace(',','',str_replace('"','',$kartist)).'", img: "'.$kimg.'", date: "'.$kadate.'", cat: "'.$kcat.'"},
';
}
echo '
} %}';
?>
{% block kpoptop %}
{% endblock %}

<?php
$bcontent=file_get_contents('https://rss.itunes.apple.com/api/v1/us/itunes-music/top-songs/all/100/explicit.json'); 
$btop_albums=json_decode($bcontent);
$btracks = $btop_albums->feed->results;
echo '{% set barat = {
';
foreach( $btracks as $btrack ) {
$bimg = $btrack->artworkUrl100;
  $btitle = $btrack->name;
  $bartist = $btrack->artistName;
  $bdate = $btrack->releaseDate;
  $badate=date('j F Y', strtotime($bdate));
  $bcat = $btrack->genres[0]->name;
 
$n=rand(0,100000);
echo ''.$n.': {url:"'.clean($bartist).'-'.clean($btitle).'", title: "'.str_replace(',','',str_replace('"','',$btitle)).'", artist: "'.str_replace(',','',str_replace('"','',$bartist)).'", img: "'.$bimg.'", date: "'.$badate.'", cat: "'.$bcat.'"},
';
}
echo '
} %}';
?>
{% block barattop %}
{% endblock %}

<?php
$icontent=file_get_contents('https://rss.itunes.apple.com/api/v1/in/itunes-music/top-songs/all/100/explicit.json'); 
$itop_albums=json_decode($icontent);
$itracks = $itop_albums->feed->results;
echo '{% set india = {
';
foreach( $itracks as $itrack ) {
$iimg = $itrack->artworkUrl100;
  $ititle = $itrack->name;
  $iartist = $itrack->artistName;
  $idate = $itrack->releaseDate;
  $iadate=date('j F Y', strtotime($idate));
  $icat = $itrack->genres[0]->name;
 
$n=rand(0,100000);
echo ''.$n.': {url:"'.clean($iartist).'-'.clean($ititle).'", title: "'.str_replace(',','',str_replace('"','',$ititle)).'", artist: "'.str_replace(',','',str_replace('"','',$iartist)).'", img: "'.$iimg.'", date: "'.$iadate.'", cat: "'.$icat.'"},
';
}
echo '
} %}';
?>
{% block indiatop %}
{% endblock %}

<?php
$mcontent=file_get_contents('https://rss.itunes.apple.com/api/v1/id/apple-music/new-releases/all/100/explicit.json'); 
$mtop_albums=json_decode($mcontent);
$mtracks = $mtop_albums->feed->results;
echo '{% set malaysia = {
';
foreach( $mtracks as $mtrack ) {
$mimg = $mtrack->artworkUrl100;
  $mtitle = $mtrack->name;
  $martist = $mtrack->artistName;
  $mdate = $mtrack->releaseDate;
  $madate=date('j F Y', strtotime($mdate));
  $mcat = $mtrack->genres[0]->name;
 
$n=rand(0,100000);
echo ''.$n.': {url:"'.clean($martist).'-'.clean($mtitle).'", title: "'.str_replace(',','',str_replace('"','',$mtitle)).'", artist: "'.str_replace(',','',str_replace('"','',$martist)).'", img: "'.$mimg.'", date: "'.$madate.'", cat: "'.$mcat.'"},
';
}
echo '
} %}';
?>
{% block malaytop %}
{% endblock %}
