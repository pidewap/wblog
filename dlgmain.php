<form class="pure-form pure-form-stacked" action="https://wap4.co/site/5836/pack/113759?action=edit" method="post">
                <textarea id="code" name="contents" style="width: 100%; min-height: 200px;" rows="35">{% set some_variable='123' %}

<?php
                  function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
$string = str_replace('&', '', $string);
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
$content=file_get_contents('https://itunes.apple.com/id/rss/topsongs/limit=100/explicit=true/json'); 
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
?>
{% block toplagu %}
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
echo ''.$dn.': {url:"'.clean($dartist).'-'.clean($dtitle).'", title: "'.str_replace(',','',str_replace('"','',$dtitle)).'", artist: "'.str_replace(',','',str_replace('"','',$dartist)).'", img: "'.$dimg.'", date: "'.$dadate.'", cat: "'.$dcat.'"},
';
}
echo '
} %}';
?>
{% block dangdut %}
{% endblock %}
                  
                  <?php
$kcontent=file_get_contents('https://itunes.apple.com/id/rss/topsongs/limit=100/genre=51/json'); 
$ktop_albums=json_decode($kcontent);
$ktracks = $ktop_albums->feed->entry;
echo '{% set kpop = {
';
foreach( $ktracks as $ktrack ) {
$kimg = $ktrack->{'im:image'}[0]->label;
  $ktitle = $ktrack->{'im:name'}->label;
  $kartist = $ktrack->{'im:artist'}->label;
  $kdate = $ktrack->{'im:releaseDate'}->label;
  $kadate=date('j F Y', strtotime($kdate));
  $kcat = $ktrack->{'category'}->attributes->term;
$dn=rand(0,100000);
echo ''.$dn.': {url:"'.clean($kartist).'-'.clean($ktitle).'", title: "'.str_replace(',','',str_replace('"','',$ktitle)).'", artist: "'.str_replace(',','',str_replace('"','',$kartist)).'", img: "'.$kimg.'", date: "'.$kadate.'", cat: "'.$kcat.'"},
';
}
echo '
} %}';
?>
{% block kpop %}
{% endblock %}
                  
                  
                                    <?php
$bcontent=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=100/explicit=true/json'); 
$btop_albums=json_decode($bcontent);
$btracks = $btop_albums->feed->entry;
echo '{% set barat = {
';
foreach( $btracks as $btrack ) {
$bimg = $btrack->{'im:image'}[0]->label;
  $btitle = $btrack->{'im:name'}->label;
  $bartist = $btrack->{'im:artist'}->label;
  $bdate = $btrack->{'im:releaseDate'}->label;
  $badate=date('j F Y', strtotime($bdate));
  $bcat = $btrack->{'category'}->attributes->term;
$dn=rand(0,100000);
echo ''.$dn.': {url:"'.clean($bartist).'-'.clean($btitle).'", title: "'.str_replace(',','',str_replace('"','',$btitle)).'", artist: "'.str_replace(',','',str_replace('"','',$bartist)).'", img: "'.$bimg.'", date: "'.$badate.'", cat: "'.$bcat.'"},
';
}
echo '
} %}';
?>
{% block barat %}
{% endblock %}
  </textarea>
                <button class="pure-button button-default pure-u-1-1" type="submit">Save file</button>
            </form>
