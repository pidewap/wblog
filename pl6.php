<?php
                  function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
$string = str_replace('&', '', $string);
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
$content=file_get_contents('https://rss.itunes.apple.com/api/v1/id/apple-music/new-releases/all/10/explicit.json'); 
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set top = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
  $title = $track->{'im:name'}->label;
  $artist = $track->{'im:artist'}->label;
  $date = $track->{'im:releaseDate'}->label;
  $adate=date('j F Y', strtotime($date));
  $cat = $track->{'category'}->attributes->term;
 
$n=rand(0,100000);
echo ''.$n.': {url:"'.clean($artist).'-'.clean($title).'", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'", date: "'.$adate.'", cat: "'.$cat.'"},
';
}
echo '
} %}';
print $top_album;
?>
{% block toplagu %}
{% endblock %}
