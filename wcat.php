<textarea id="code" name="contents" style="width: 100%; min-height: 200px;" rows="35">  {% set some_variable='123' %}
<?php
error_reporting(0);
function clean($string) {
    return preg_replace('/[^a-zA-Z0-9\']/', '', $string); // Removes special chars.
    $string = str_replace("'", '', $string);
}

$content=file_get_contents('http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topsongs/limit=100/json');
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set top = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
    $title = $track->{'im:name'}->label;
    $artist = $track->{'im:artist'}->label;
    $ui=''.$title.' '.$artist.'';
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($ui).'url", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'"},
';
}
echo '
} %}{% block top %}
{% endblock %}';


$content=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=100/genre=1274/json');
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set dangdut = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
    $title = $track->{'im:name'}->label;
    $artist = $track->{'im:artist'}->label;
    $ui=''.$title.' '.$artist.'';
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($ui).'url", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'"},
';
}
echo '
} %}{% block dangdut %}
{% endblock %}';

$content=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=100/genre=51/json');
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set kpop = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
    $title = $track->{'im:name'}->label;
    $artist = $track->{'im:artist'}->label;
    $ui=''.$title.' '.$artist.'';
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($ui).'url", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'"},
';
}
echo '
} %}{% block kpop %}
{% endblock %}';

$content=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=100/genre=27/json');
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set jpop = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
    $title = $track->{'im:name'}->label;
    $artist = $track->{'im:artist'}->label;
    $ui=''.$title.' '.$artist.'';
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($ui).'url", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'"},
';
}
echo '
} %}{% block jpop %}
{% endblock %}';

$content=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=100/genre=1250/json');
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set cpop = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
    $title = $track->{'im:name'}->label;
    $artist = $track->{'im:artist'}->label;
    $ui=''.$title.' '.$artist.'';
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($ui).'url", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'"},
';
}
echo '
} %}{% block cpop %}
{% endblock %}';

$content=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=100/genre=1262/json');
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set india = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
    $title = $track->{'im:name'}->label;
    $artist = $track->{'im:artist'}->label;
    $ui=''.$title.' '.$artist.'';
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($ui).'url", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'"},
';
}
echo '
} %}{% block india %}
{% endblock %}';


$content=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=100/genre=29/json');
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set anime = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
    $title = $track->{'im:name'}->label;
    $artist = $track->{'im:artist'}->label;
    $ui=''.$title.' '.$artist.'';
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($ui).'url", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'"},
';
}
echo '
} %}{% block anime %}
{% endblock %}';

$content=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=100/genre=1259/json');
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set indonesia = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
    $title = $track->{'im:name'}->label;
    $artist = $track->{'im:artist'}->label;
    $ui=''.$title.' '.$artist.'';
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($ui).'url", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'"},
';
}
echo '
} %}{% block indonesia %}
{% endblock %}';

$content=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=100/genre=1255/json');
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set malaysia = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
    $title = $track->{'im:name'}->label;
    $artist = $track->{'im:artist'}->label;
               $ui=''.$title.' '.$artist.'';
$n=rand(0,100000);
echo ''.$n.': {url:"url'.clean($ui).'url", title: "'.str_replace(',','',str_replace('"','',$title)).'", artist: "'.str_replace(',','',str_replace('"','',$artist)).'", img: "'.$img.'"},
';
}
echo '
} %}{% block malaysia %}
{% endblock %}';








?>  </textarea>
