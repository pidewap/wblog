<?php
                  function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
$string = str_replace('&', '', $string);
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
$content=file_get_contents('https://rss.itunes.apple.com/api/v1/id/apple-music/new-releases/all/10/explicit.json'); 
$top_albums=json_decode($content, true);
$tracks = $top_albums->feed->results;
echo '{% set top = {
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
} %}<br><br>';
print_r($top_albums->feed->results);
?>
{% block toplagu %}
{% endblock %}
