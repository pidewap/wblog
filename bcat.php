<a href="/bmain.php">bmain.php</a>||<a href="/bmusic.php">bmusic.php</a>||<a href="/bcat.php?id=top">bcat.php</a><br><br>

<?php
if($_GET['id'] == 'top'){
$form='https://wap4.co/site/4775/pack/82994?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=200/json';
            $ltitle='TOP List';
}
if($_GET['id'] == 'dangdut'){
$form='https://wap4.co/site/4775/pack/82995?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=200/genre=1274/json';
            $ltitle='Dangdut';
}
if($_GET['id'] == 'kpop'){
$form='https://wap4.co/site/4775/pack/82996?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=200/genre=51/json';
            $ltitle='K-POP';
}
if($_GET['id'] == 'jpop'){
$form='https://wap4.co/site/4775/pack/82997?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=200/genre=27/json';
            $ltitle='J-POP';
}
if($_GET['id'] == 'cpop'){
$form='https://wap4.co/site/4775/pack/82998?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=200/genre=1250/json';
            $ltitle='C-POP';
}
if($_GET['id'] == 'india'){
$form='https://wap4.co/site/4775/pack/82999?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=200/genre=1262/json';
            $ltitle='India Bollywood';
}
if($_GET['id'] == 'anime'){
$form='https://wap4.co/site/4775/pack/83000?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=200/genre=29/json';
            $ltitle='Anime Music';
}
if($_GET['id'] == 'barat'){
$form='https://wap4.co/site/4775/pack/83001?action=edit';
            $linkurl='https://itunes.apple.com/us/rss/topsongs/limit=200/json';
            $ltitle='Lagu Barat';
}
if($_GET['id'] == 'malay'){
$form='https://wap4.co/site/4775/pack/83002?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=200/genre=1255/json';
            $ltitle='Malaysia Pop';
}
?>
<a href="?id=top">top</a>||<a href="?id=kpop">kpop</a>||<a href="?id=jpop">jpop</a>||<a href="?id=cpop">cpop</a>||<a href="?id=dangdut">dangdut</a>||<a href="?id=anime">anime</a>||<a href="?id=india">india</a>||<a href="?id=barat">barat</a>||<a href="?id=malay">malay</a>||<br><br>

<form class="pure-form pure-form-stacked" action="<?php echo $form; ?>" method="post">

            <textarea id="code" name="contents" style="width: 100%; min-height: 200px;display:none;" rows="35">{% set desc = '<?php echo $ltitle; ?>, Bursa MP3, Download Lagu, Download MP3 Band Indie, Download Lagu Gratis, Download Video Terbaru, Hits Musik Barat' %}
{% set title = '<?php echo $ltitle; ?> - Bursa MP3' %}

<?php
$content=file_get_contents($linkurl); 
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set top = {
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
{% use '_blocks' %}

{{ block( 'head_tags' ) }}

&lt;body&gt;

{{ block( 'search' ) }}
&lt;div align="left"&gt;
  &lt;div id="k"&gt;
&lt;div class="note2" style="margin:3px;align:left;"&gt;&lt;a href="/"&gt;&lt;b&gt;Bursa MP3&lt;/b&gt;&lt;/a&gt; adalah mesin pencari video terlengkap yang bisa disimpan dan dikonversi menjadi MP3 atau lagu. Sistem situs otomatis menelusuri konten paling relevan dan mengambilnya untuk ditampilkan kepada pengunjung.&lt;/div&gt;
&lt;/div&gt;&lt;/div&gt;
      {% if top|length &gt; 0 %}
        &lt;div id="k"&gt;
&lt;h3 class="title"&gt;<?php echo $ltitle; ?>&lt;/h3&gt;
          &lt;div id="indie"&gt;
{% for video in top|slice(0, 200) %}
    {% set artis %}{{ video.artist|raw|lower|replace({"\\":'','#':"",'-':"",'~':"",'!':"",'@':"",'$':"",'%':"",'^':"",'&amp;':"",'*':"",'(':"",')':"",'-':"",'=':"",'+':"",'_':"",']':"",'[':"",'{':"",'}':"",';':"",':':"",'/':"",'.':"",',':"",'&lt;':"",'&gt;':"",'?':"",'|':"","'":''}) }}{% endset %}
    {% set judul %}{{ video.title|raw|lower|replace({"\\":'','#':"",'-':"",'~':"",'!':"",'@':"",'$':"",'%':"",'^':"",'&amp;':"",'*':"",'(':"",')':"",'-':"",'=':"",'+':"",'_':"",']':"",'[':"",'{':"",'}':"",';':"",':':"",'/':"",'.':"",',':"",'&lt;':"",'&gt;':"",'?':"",'|':"","'":''}) }}{% endset %}
    &lt;div class="indie-list1"&gt;&lt;a href="/music/{{ judul|replace({'  ':"-",' ':"-"}) }}-{{ artis|replace({'  ':"-",' ':"-"}) }}"&gt;{{ video.title|raw }} - {{ video.artist|raw }}&lt;/a&gt;&lt;/div&gt;
      {% endfor %}
    &lt;/div&gt;&lt;/div&gt;
    {% endif %}
    
    {{ block( 'footer' ) }}

&lt;/body&gt;</textarea>
            <button class="pure-button button-default pure-u-1-1" type="submit">Save file</button>
        </form>
