<textarea id="code" name="contents" style="width: 100%; min-height: 200px;" rows="35">{% set some_variable='123' %}

<?php
                  function clean($string) {
    return preg_replace('/[^a-zA-Z0-9\']/', '', $string); // Removes special chars.
    $string = str_replace("'", '', $string);
}

$content=file_get_contents('https://rss.itunes.apple.com/api/v1/id/apple-music/new-releases/all/100/explicit.json'); 
$top_albums=json_decode($content);
$tracks = $top_albums->feed->results;
echo '{% set indobaru = {
';
foreach( $tracks as $track ) {
if(isset($track->artistName)){
  $img = $track->artworkUrl100;
  $title = $track->name;
  $artist = $track->artistName;
  $date = $track->releaseDate;
  $adate=date('j F Y', strtotime($date));
  $cat = $track->genres[0]->name;
 
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($artist).'-'.clean($title).'url", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'", date: "'.$adate.'", cat: "'.$cat.'"},
';
}}
echo '
} %}';
?>
{% block indobaru %}
{% endblock %}

<?php

$tcontent=file_get_contents('https://rss.itunes.apple.com/api/v1/id/itunes-music/top-songs/all/100/explicit.json'); 
$ttop_albums=json_decode($tcontent);
$ttracks = $ttop_albums->feed->results;
echo '{% set indotop = {
';
foreach( $ttracks as $ttrack ) {
$timg = $ttrack->artworkUrl100;
  $ttitle = $ttrack->name;
  $tartist = $ttrack->artistName;
  $tdate = $ttrack->releaseDate;
  $tadate=date('j F Y', strtotime($tdate));
  $tcat = $ttrack->genres[0]->name;
 
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($tartist).'-'.clean($ttitle).'url", title: "'.str_replace(',','',str_replace('"','',$ttitle)).'", artist: "'.str_replace(',','',str_replace('"','',$tartist)).'", img: "'.$timg.'", date: "'.$tadate.'", cat: "'.$tcat.'"},
';
}
echo '
} %}';
?>
{% block indotop %}
{% endblock %}

<?php
$kcontent=file_get_contents('https://itunes.apple.com/id/rss/topsongs/limit=100/genre=51/json'); 
$ktop_albums=json_decode($kcontent);
$ktracks = $ktop_albums->feed->entry;
echo '{% set kpoptop = {
';
foreach( $ktracks as $ktrack ) {
$kimg = $ktrack->{'im:image'}[0]->label;
  $ktitle = $ktrack->{'im:name'}->label;
  $kartist = $ktrack->{'im:artist'}->label;
  $kdate = $ktrack->{'im:releaseDate'}->label;
  $kadate=date('j F Y', strtotime($kdate));
  $kcat = $ktrack->{'category'}->attributes->term;
$dn=rand(0,100000);
echo ''.$dn.': {url:"url'.clean($kartist).'-'.clean($ktitle).'url", title: "'.str_replace(',','',str_replace('"','',$ktitle)).'", artist: "'.str_replace(',','',str_replace('"','',$kartist)).'", img: "'.$kimg.'", date: "'.$kadate.'", cat: "'.$kcat.'"},
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
echo '{% set barattop = {
';
foreach( $btracks as $btrack ) {
$bimg = $btrack->artworkUrl100;
  $btitle = $btrack->name;
  $bartist = $btrack->artistName;
  $bdate = $btrack->releaseDate;
  $badate=date('j F Y', strtotime($bdate));
  $bcat = $btrack->genres[0]->name;
 
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($bartist).'-'.clean($btitle).'url", title: "'.str_replace(',','',str_replace('"','',$btitle)).'", artist: "'.str_replace(',','',str_replace('"','',$bartist)).'", img: "'.$bimg.'", date: "'.$badate.'", cat: "'.$bcat.'"},
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
echo '{% set indiatop = {
';
foreach( $itracks as $itrack ) {
$iimg = $itrack->artworkUrl100;
  $ititle = $itrack->name;
  $iartist = $itrack->artistName;
  $idate = $itrack->releaseDate;
  $iadate=date('j F Y', strtotime($idate));
  $icat = $itrack->genres[0]->name;
 
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($iartist).'-'.clean($ititle).'url", title: "'.str_replace(',','',str_replace('"','',$ititle)).'", artist: "'.str_replace(',','',str_replace('"','',$iartist)).'", img: "'.$iimg.'", date: "'.$iadate.'", cat: "'.$icat.'"},
';
}
echo '
} %}';
?>
{% block indiatop %}
{% endblock %}

<?php
$mcontent=file_get_contents('https://rss.itunes.apple.com/api/v1/my/itunes-music/top-songs/all/100/explicit.json'); 
$mtop_albums=json_decode($mcontent);
$mtracks = $mtop_albums->feed->results;
echo '{% set malaytop = {
';
foreach( $mtracks as $mtrack ) {
$mimg = $mtrack->artworkUrl100;
  $mtitle = $mtrack->name;
  $martist = $mtrack->artistName;
  $mdate = $mtrack->releaseDate;
  $madate=date('j F Y', strtotime($mdate));
  $mcat = $mtrack->genres[0]->name;
 
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($martist).'-'.clean($mtitle).'url", title: "'.str_replace(',','',str_replace('"','',$mtitle)).'", artist: "'.str_replace(',','',str_replace('"','',$martist)).'", img: "'.$mimg.'", date: "'.$madate.'", cat: "'.$mcat.'"},
';
}
echo '
} %}';
?>
{% block malaytop %}
{% endblock %}

<?php
$dcontent=file_get_contents('https://itunes.apple.com/id/rss/topsongs/limit=100/genre=1274/json'); 
$dtop_albums=json_decode($dcontent);
$dtracks = $dtop_albums->feed->entry;
echo '{% set dangdut = {
';
foreach( $dtracks as $dtrack ) {
$dimg = $dtrack->{'im:image'}[0]->label;
  $dtitle = $dtrack->{'im:name'}->label;
  $dartist = $dtrack->{'im:artist'}->label;
  $ddate = $dtrack->{'im:releaseDate'}->label;
  $dadate=date('j F Y', strtotime($ddate));
  $dcat = $dtrack->{'category'}->attributes->term;
$dn=rand(0,100000);
echo ''.$dn.': {url:"url'.clean($dartist).'-'.clean($dtitle).'url", title: "'.str_replace(',','',str_replace('"','',$dtitle)).'", artist: "'.str_replace(',','',str_replace('"','',$dartist)).'", img: "'.$dimg.'", date: "'.$dadate.'", cat: "'.$dcat.'"},
';
}
echo '
} %}';
?>
{% block dangdut %}
{% endblock %}
</textarea>
