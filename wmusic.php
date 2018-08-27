<a href="/wmain.php">wmain.php</a>||<a href="/wmusic.php">wmusic.php</a>||<a href="/wdownload.php">wdownload.php</a><br><br>

<form class="pure-form pure-form-stacked" action="https://wap4.co/site/4774/pack/81423?tab=file_edit&amp;file=%2Fmusic" method="post">
                <textarea id="code" name="contents" style="width: 100%; min-height: 200px;display: none" rows="35">{% set desc %}{{ search_term|title }}, Download lagu {{ search_term|title }}, Free Download {{ search_term|title }} Mp3, Video {{ search_term|title }}, Download Lagu {{ search_term|title }}, Music Video {{ search_term|title }}{% endset %}
{% set kw %}{{ search_term|title }},Download {{ search_term|title }} Mp3,lagu {{ search_term|title }},{{ search_term|title }} mp3,lirik lagu {{ search_term|title }}, music video {{ search_term|title }}, download {{ search_term|title }} free song{% endset %}
{% set ogimage %}
{% for vi in videos|slice(0, 1) %}
&lt;meta property="og:image" content="https://ytimg.googleusercontent.com/vi/{{ vi.video_id }}/hqdefault.jpg"&gt;{% endfor %}
{% endset %}
{% set title = 'Download ' ~ search_term|title ~ ' - WBlog' %}
<?php
$content=file_get_contents('http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topsongs/limit=15/json'); 
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
{% use '_blocks' %}

{{ block( 'head_tags' ) }}

&lt;body&gt;

{{ block( 'search' ) }}
&lt;div class="wrapper"&gt;&lt;div class="menu-home"&gt;&lt;h2 class="title-menu"&gt;Search Result&lt;/h2&gt;
  &lt;div class="notifin"&gt;Our system detected that you try to find a content. Free download entitled &lt;b&gt;{{ search_term|title }}&lt;/b&gt; as video and song. This free download was based on internet.&lt;/div&gt;
    {% if videos|length &gt; 0 %}
            {% for video in videos|slice(0, 20) %}
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
        {% if pages|length &gt; 0 %}
            &lt;div class="btn-load"&gt;Pages: 
                {% for page, link in pages %}
                    &lt;a class="pure-button nav-button {% if current_page == page %}current-page{% endif %}" href="{{ link }}"&gt;{{page}}&lt;/a&gt;
                {% endfor %}
            &lt;/div&gt;
        {% endif %}

    {% else %}
        &lt;small&gt;No videos found with "{{ search_term }}" term.&lt;/small&gt;
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
  
  &lt;h3 class="title-menu"&gt;Trending Search&lt;/h3&gt;
  {% if nav|length &gt; 0 %}
{% for video in nav|slice(0, 15) %}
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
  
    {{ block ('recent_searches') }}

&lt;/div&gt;&lt;/div&gt;

{{ block( 'footer' ) }}

&lt;/body&gt;</textarea>
                <button class="pure-button button-default pure-u-1-1" type="submit">Save file</button>
            </form>
