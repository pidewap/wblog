<?php
if($_GET['id'] == 'top'){
$form='https://wap4.co/site/4769/pack/83136?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=100/json';
            $ltitle='Top Indonesia - HarianLagu';
}
if($_GET['id'] == 'dangdut'){
$form='https://wap4.co/site/4769/pack/83137?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=100/genre=1274/json';
            $ltitle='Dangdut - HarianLagu';
}
if($_GET['id'] == 'kpop'){
$form='https://wap4.co/site/4769/pack/83138?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=100/genre=51/json';
            $ltitle='K-POP - HarianLagu';
}
if($_GET['id'] == 'jpop'){
$form='https://wap4.co/site/4769/pack/83139?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=100/genre=27/json';
            $ltitle='J-POP - HarianLagu';
}
if($_GET['id'] == 'cpop'){
$form='https://wap4.co/site/4769/pack/83140?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=100/genre=1250/json';
            $ltitle='C-POP - HarianLagu';
}
if($_GET['id'] == 'india'){
$form='https://wap4.co/site/4769/pack/83141?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=100/genre=1262/json';
            $ltitle='India Bollywood - HarianLagu';
}
if($_GET['id'] == 'anime'){
$form='https://wap4.co/site/4769/pack/83142?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=100/genre=29/json';
            $ltitle='Anime Music - HarianLagu';
}
if($_GET['id'] == 'barat'){
$form='https://wap4.co/site/4769/pack/83143?action=edit';
            $linkurl='https://itunes.apple.com/us/rss/topsongs/limit=100/json';
            $ltitle='Lagu Barat - HarianLagu';
}
if($_GET['id'] == 'malay'){
$form='https://wap4.co/site/4769/pack/83144?action=edit';
            $linkurl='https://itunes.apple.com/id/rss/topsongs/limit=100/genre=1255/json';
            $ltitle='Malaysia Pop - HarianLagu';
}
?>
<a href="?id=top">top</a>||<a href="?id=kpop">kpop</a>||<a href="?id=jpop">jpop</a>||<a href="?id=cpop">cpop</a>||<a href="?id=dangdut">dangdut</a>||<a href="?id=anime">anime</a>||<a href="?id=india">india</a>||<a href="?id=barat">barat</a>||<a href="?id=malay">malay</a>||<br><br>
<form class="pure-form pure-form-stacked" action="<?php echo $form; ?>" method="post">

            <textarea id="code" name="contents" style="width: 100%; min-height: 200px;display:none" rows="35">{% set desc = '<?php echo $ltitle; ?>' %}
{% set kw = '<?php echo $ltitle; ?>' %}
{% set title = '<?php echo $ltitle; ?>' %}

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
  
  &lt;div class="wrapper"&gt;&lt;div class="menu-home"&gt;&lt;h2 class="title-menu"&gt;<?php echo str_replace(' - HarianLagu','',$ltitle); ?> - 100 Music&lt;/h2&gt;
&lt;div class="notifin"&gt;Latest update on: <?php echo date("l, Y-m-d"); ?>&lt;/div&gt;
  
  {% if top|length &gt; 0 %}
{% for video in top|slice(0, 100) %}
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

    
    &lt;/div&gt;&lt;/div&gt;
    {{ block( 'footer' ) }}

&lt;/body&gt;</textarea>
            <button class="pure-button button-default pure-u-1-1" type="submit">Save file</button>
        </form>
