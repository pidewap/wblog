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
