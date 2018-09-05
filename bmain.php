<a href="/bmain.php">bmain.php</a>||<a href="/bmusic.php">bmusic.php</a>||<a href="/bdownload.php">bdownload.php</a>||<a href="/bcat.php">bcat.php</a><br><br>
<form class="pure-form pure-form-stacked" action="https://wap4.co/site/4775/pack/81430?tab=file_edit&amp;file=%2F" method="post">
                <textarea id="code" name="contents" style="width: 100%; min-height: 200px" rows="35">{% set desc = 'Bursa MP3, Download Lagu, Download MP3 Band Indie, Download Lagu Gratis, Download Video Terbaru, Hits Musik Barat' %}
{% set ogimage %}
{% for vi in videos|slice(0, 1) %}
&lt;meta property="og:image" content="https://ytimg.googleusercontent.com/vi/{{ vi.video_id }}/hqdefault.jpg"&gt;{% endfor %}
{% endset %}
<?php
$content=file_get_contents('https://itunes.apple.com/id/rss/topsongs/limit=30/json'); 
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
&lt;a href="/jpop.html" title="Daftar Lagu J-POP"&gt;&lt;button class="bt" type="submit"&gt;J-POP&lt;/button&gt;&lt;/a&gt; &lt;a href="/india.html" title="Daftar Lagu India"&gt;&lt;button class="bt" type="submit"&gt;India&lt;/button&gt;&lt;/a&gt; &lt;a href="/anime.html" title="Daftar Lagu Anime"&gt;&lt;button class="bt" type="submit"&gt;Anime&lt;/button&gt;&lt;/a&gt; &lt;a href="kpop.html" title="Daftar Lagu K-POP"&gt;&lt;button class="bt" type="submit"&gt;K-POP&lt;/button&gt;&lt;/a&gt; &lt;a href="/dangdut.html" title="Daftar Lagu Dangdut"&gt;&lt;button class="bt" type="submit"&gt;Dangdut&lt;/button&gt;&lt;/a&gt; &lt;a href="/malaysia.html" title="Daftar Lagu Malaysia"&gt;&lt;button class="bt" type="submit"&gt;Malaysia&lt;/button&gt;&lt;/a&gt; &lt;a href="/barat.html" title="Daftar Lagu Barat"&gt;&lt;button class="bt" type="submit"&gt;Barat&lt;/button&gt;&lt;/a&gt;
  &lt;/div&gt;
  &lt;/div&gt;

  &lt;div id="k"&gt;
&lt;h3 class="title"&gt;Paling Dicari &lt;a href="/toplist.html"&gt;Tampilkan Semua&lt;/a&gt;&lt;/h3&gt;
    {% if top|length &gt; 0 %}
{% for video in top|slice(0, 30) %}
    {% set artis %}{{ video.artist|raw|lower|replace({"\\":'','#':"",'-':"",'~':"",'!':"",'@':"",'$':"",'%':"",'^':"",'&amp;':"",'*':"",'(':"",')':"",'-':"",'=':"",'+':"",'_':"",']':"",'[':"",'{':"",'}':"",';':"",':':"",'/':"",'.':"",',':"",'&lt;':"",'&gt;':"",'?':"",'|':"","'":''}) }}{% endset %}
    {% set judul %}{{ video.title|raw|lower|replace({"\\":'','#':"",'-':"",'~':"",'!':"",'@':"",'$':"",'%':"",'^':"",'&amp;':"",'*':"",'(':"",')':"",'-':"",'=':"",'+':"",'_':"",']':"",'[':"",'{':"",'}':"",';':"",':':"",'/':"",'.':"",',':"",'&lt;':"",'&gt;':"",'?':"",'|':"","'":''}) }}{% endset %}
    &lt;div class="indie-list1"&gt;
&lt;table&gt;
&lt;tbody&gt;&lt;tr valign="top"&gt;
&lt;td class="indie-list-gambar"&gt;
&lt;img class="thumb1" src="{{ video.img }}" alt="Thumbnail {{ video.title|raw }} - {{ video.artist|raw }}"&gt;
&lt;/td&gt;
&lt;td class="indie-list-list"&gt; &lt;a href="/music/{{ artis|replace({'  ':"-",' ':"-"}) }}-{{ judul|replace({'  ':"-",' ':"-"}) }}"&gt;{{ video.title|raw }}.mp4&lt;/a&gt;&lt;br&gt;
Oleh &lt;b&gt;{{ video.artist|raw }}&lt;/b&gt;&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;&lt;/table&gt;&lt;/div&gt;
      {% endfor %}
    
    {% endif %}

    {{ block ('recent_searches') }}

&lt;/div&gt;

{{ block( 'footer' ) }}

&lt;/body&gt;</textarea>
                <button class="pure-button button-default pure-u-1-1" type="submit">Save file</button>
            </form>
