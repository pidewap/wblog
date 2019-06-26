<a href="/wmain.php">wmain.php</a>||<a href="/wmusic.php">wmusic.php</a>||<a href="/wdownload.php">wdownload.php</a>||<a href="/wcat.php?id=top">wcat.php</a><br><br>

<form class="pure-form pure-form-stacked" action="https://wap4.co/site/4774/pack/81423?tab=file_edit&amp;file=%2F" method="post">
                <textarea id="code" name="contents" style="width: 100%; min-height: 200px;" rows="35">{% set desc = 'WBlog is a mobile based free video and song search engine powered by free internet result' %}
{% set kw = 'WBlog is a mobile based free video and song search engine powered by free internet result' %}
{% set ogimage %}
{% for vi in videos|slice(0, 1) %}
&lt;meta property="og:image" content="https://ytimg.googleusercontent.com/vi/{{ vi.video_id }}/hqdefault.jpg"&gt;{% endfor %}
{% endset %}
{% set title = 'WBlog - Free Entertainment Search Engine to Download' %}
<?php
                  function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}
$content=file_get_contents('https://itunes.apple.com/id/rss/topsongs/limit=35/explicit=true/json'); 
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

<?php
$icontent=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=10/genre=1259/json'); 
$itop_albums=json_decode($icontent);
$itracks = $itop_albums->feed->entry;
echo '{% set indo = {
';
foreach( $itracks as $itrack ) {
$iimg = $itrack->{'im:image'}[0]->label;
  $ititle = $itrack->{'im:name'}->label;
  $iartist = $itrack->{'im:artist'}->label;
$in=rand(0,100000);
echo ''.$in.': {title: "'.str_replace(',','',str_replace('"','',$ititle)).'", artist: "'.str_replace(',','',str_replace('"','',$iartist)).'", img: "'.$iimg.'"},
';
}
echo '
} %}';
?>


<?php
$dcontent=file_get_contents('https://itunes.apple.com/us/rss/topsongs/limit=10/genre=1274/json'); 
$dtop_albums=json_decode($dcontent);
$dtracks = $dtop_albums->feed->entry;
echo '{% set dangdut = {
';
foreach( $dtracks as $dtrack ) {
$dimg = $dtrack->{'im:image'}[0]->label;
  $dtitle = $dtrack->{'im:name'}->label;
  $dartist = $dtrack->{'im:artist'}->label;
$dn=rand(0,100000);
echo ''.$dn.': {title: "'.str_replace(',','',str_replace('"','',$dtitle)).'", artist: "'.str_replace(',','',str_replace('"','',$dartist)).'", img: "'.$dimg.'"},
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
    &lt;h2 class="title-menu"&gt;Hot Today&lt;/h2&gt;
    {% if videos|length &gt; 0 %}
            {% for video in videos|slice(0, 10) %}
          &lt;div class="menulist"&gt;
&lt;table width="100%" cellspacing="1" cellpadding="1"&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td width="15%" align="center" valign="top"&gt;&lt;img style="border:1px solid #e5e5e5;" src="{{ video.thumb_url }}" alt="Thumbnail {{ video.title|raw }}" title="Search {{ video.title|raw }}" class="thumb"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;&lt;a href="/download/music/{{ video.video_id }}/linkdownload.html" title="Download {{ video.title|raw }}"&gt;&lt;b&gt;{{ video.title|raw }}&lt;/b&gt;&lt;/a&gt;&lt;br&gt;&lt;small&gt;by: &lt;b&gt;{{ video.channel|raw }}&lt;/b&gt;&lt;/small&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
            {% endfor %}
    {% else %}
        &lt;small&gt;Sorry, the system is currently experiencing dificulties. Please try again later&lt;/small&gt;
    {% endif %}
    &lt;h2 class="title-menu"&gt;Trending Search&lt;/h2&gt;
      {% if top|length &gt; 0 %}
{% for video in top|slice(0, 15) %}
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
      &lt;center&gt;&lt;a class="btn-load" href="/toplist.html"&gt;More&lt;/a&gt;&lt;/center&gt;
    {% endif %}
  &lt;/div&gt;&lt;div class="menu-sidebar"&gt;&lt;h3 class="title-menu"&gt;Song Categories&lt;/h3&gt;
&lt;div class="notifin"&gt;This is the popular search by users, not all categories appear. You must use search bar to find any content from all around of internet.&lt;/div&gt;
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/toplist.html" title="TOP List"&gt;TOP List&lt;/a&gt;&lt;/div&gt;
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
&lt;div style="font-size:14px;"&gt;» &lt;a href="/anime.html" title="Anime"&gt;Anime&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
    &lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/indo.html" title="Indo Pop"&gt;Indo Pop&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
&lt;div class="menulist"&gt;&lt;table&gt;&lt;tbody&gt;
&lt;tr valign="middle"&gt;
&lt;td valign="top"&gt;&lt;/td&gt;
&lt;td valign="top"&gt;
&lt;div style="font-size:14px;"&gt;» &lt;a href="/malay.html" title="Malay Pop"&gt;Malay Pop&lt;/a&gt;&lt;/div&gt;
&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
&lt;h3 class="title-menu"&gt;Indo Pop&lt;/h3&gt;
  {% if indo|length &gt; 0 %}
{% for video in indo|slice(0, 10) %}
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
  &lt;h3 class="title-menu"&gt;Dangdut&lt;/h3&gt;
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
  
  &lt;/div&gt;
&lt;/div&gt;
{{ block( 'footer' ) }}

&lt;/body&gt;</textarea>
                <button class="pure-button button-default pure-u-1-1" type="submit">Save file</button>
            </form>
