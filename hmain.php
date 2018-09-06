<a href="/main.php">main.php</a>||<a href="/music.php">music.php</a>||<a href="/download.php">download.php</a>||<a href="/cat.php?id=top">cat.php</a><br><br>

<form class="pure-form pure-form-stacked" action="https://wap4.co/site/4769/pack/81031?tab=file_edit&amp;file=%2F" method="post">
                <textarea id="code" name="contents" style="width: 100%; min-height: 200px" rows="35">{% set desc = 'Gratis Download Lagu Terbaru, Download Lagu Terbaru, Gudang Lagu Mp3 Gratis Terpopuler , Download Lagu Gratis, Gudang lagu Mp3 Indonesia, lagu barat terbaik.' %}
{% set kw = 'Download Lagu,lagu terbaru,lagu dangdut,lagu barat,lagu kpop,lagu baru mp3 download,lagu lawas,dangdut koplo,rap,hip-hop,electro music,dj house,pop,rock,lagu melow,lagu tembang kenangan,singles dan full albums mp3 songs' %}
{% set ogimage %}
{% for vi in videos|slice(0, 1) %}
&lt;meta property="og:image" content="https://ytimg.googleusercontent.com/vi/{{ vi.video_id }}/hqdefault.jpg"&gt;{% endfor %}
{% endset %}
{% set title = 'HarianLagu - Download Lagu Terbaru 2018' %}
<?php
$content=file_get_contents('https://itunes.apple.com/id/rss/topsongs/limit=10/json'); 
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
<?php
$content=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=10/json'); 
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set barat = {
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
<?php
$content=file_get_contents('https://itunes.apple.com/id/rss/topsongs/limit=10/genre=1274/json'); 
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set dangdut = {
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
<?php
$content=file_get_contents('https://itunes.apple.com/id/rss/topsongs/limit=10/genre=51/json'); 
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '{% set kpop = {
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

&lt;div class="wrapper"&gt;
  &lt;div class="menu-home"&gt;
    &lt;h2 class="title-menu"&gt;Paling banyak di download&lt;/h2&gt;
    {% if top|length &gt; 0 %}
            {% for video in top|slice(0, 10) %}
          &lt;div class="menulist"&gt;
&lt;table width="100%" cellspacing="1" cellpadding="1"&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td width="15%" align="center" valign="top"&gt;&lt;img style="border:1px solid #e5e5e5;" src="{{ video.img }}" alt="Thumbnail {{ video.title|raw }}" title="Search {{ video.title|raw }}" class="thumb"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;&lt;a href="/music/{{ video.title|raw|lower|replace({' ':"-"}) }}-{{ video.artist|raw|lower|replace({' ':"-"}) }}" title="Download {{ video.title|raw }}"&gt;&lt;b&gt;{{ video.title|raw }}&lt;/b&gt;&lt;/a&gt;&lt;br&gt;&lt;small&gt;by: &lt;b&gt;{{ video.artist|raw }}&lt;/b&gt;&lt;/small&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
            {% endfor %}
    {% else %}
        &lt;small&gt;Sorry, the system is currently experiencing dificulties. Please try again later&lt;/small&gt;
    {% endif %}
    &lt;center&gt;&lt;a class="btn-load" href="/indo.html"&gt;More&lt;/a&gt;&lt;/center&gt;
    &lt;h2 class="title-menu"&gt;Dangdut&lt;/h2&gt;
      {% if dangdut|length &gt; 0 %}
{% for video in dangdut|slice(0, 10) %}
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;&lt;a title="{{ video.title|raw }} - {{ video.artist|raw }}" href="/music/{{ video.title|raw|lower|replace({' ':"-"}) }}-{{ video.artist|raw|lower|replace({' ':"-"}) }}"&gt;{{ video.title|raw }} - {{ video.artist|raw }}&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
      {% endfor %}
    {% endif %}
  &lt;/div&gt;&lt;div class="menu-sidebar"&gt;
&lt;h3 class="title-menu"&gt;K-POP&lt;/h3&gt;
  {% if kpop|length &gt; 0 %}
{% for video in kpop|slice(0, 10) %}
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;&lt;a title="{{ video.title|raw }} - {{ video.artist|raw }}" href="/music/{{ video.title|raw|lower|replace({' ':"-"}) }}-{{ video.artist|raw|lower|replace({' ':"-"}) }}"&gt;{{ video.title|raw }} - {{ video.artist|raw }}&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
      {% endfor %}
    {% endif %}
  &lt;h3 class="title-menu"&gt;Lagu Barat&lt;/h3&gt;
  {% if barat|length &gt; 0 %}
{% for video in barat|slice(0, 10) %}
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;&lt;a title="{{ video.title|raw }} - {{ video.artist|raw }}" href="/music/{{ video.title|raw|lower|replace({' ':"-"}) }}-{{ video.artist|raw|lower|replace({' ':"-"}) }}"&gt;{{ video.title|raw }} - {{ video.artist|raw }}&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
      {% endfor %}
    {% endif %}
  &lt;h3 class="title-menu"&gt;Kategori Lagu&lt;/h3&gt;
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/toplist.html" title="TOP List"&gt;Top Indo&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/dangdut.html" title="Dangdut"&gt;Dangdut&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/kpop.html" title="K-POP"&gt;K-POP&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/jpop.html" title="J-POP"&gt;J-POP&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
  &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/cpop.html" title="C-POP"&gt;C-POP&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/india.html" title="India"&gt;India&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/anime.html" title="Anime"&gt;OST Anime&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/barat.html" title="Lagu Barat"&gt;Lagu Barat&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
&lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/malay.html" title="Malaysia"&gt;Malaysia&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
{{ block( 'footer' ) }}

&lt;/body&gt;</textarea>
                <button class="pure-button button-default pure-u-1-1" type="submit">Save file</button>
            </form>
