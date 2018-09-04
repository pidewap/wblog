<textarea>
  <?php
$content=file_get_contents('https://itunes.apple.com/id/rss/topsongs/limit=100/json'); 
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set nav = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
  $title = $track->{'im:name'}->label;
  $artist = $track->{'im:artist'}->label;
$n=rand(0,100000);
echo ''.$n.': {title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'"},
';
}
echo '
} %}';
?>
</textarea>
