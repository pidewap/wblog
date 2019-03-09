<a href="/wmain.php">wmain.php</a>||<a href="/wmusic.php">wmusic.php</a>||<a href="/wdownload.php">wdownload.php</a>||<a href="/wcat.php?id=top">wcat.php</a><br><br>
 
<form class="pure-form pure-form-stacked" action="https://wap4.co/site/4774/pack/81423?tab=file_edit&file=%2Fdownload" method="post">
                <textarea id="code" name="contents" style="width: 100%; min-height: 200px;display: none" rows="35">{% set title = 'Download ' ~ data.fulltitle ~ ' - WBlog' %}
{% set url = current_url %}
{% set desc %}{{ data.fulltitle }}, Download lagu {{ data.fulltitle }}, Free Download {{ data.fulltitle }} Mp3, Video {{ data.fulltitle }}, Download Lagu {{ data.fulltitle }}, Music Video {{ data.fulltitle }}, {{ data.description|replace({"\n":' ', "\r":' '}) }}{% endset %}
{% set kw %}{{ data.fulltitle }},Download {{ data.fulltitle }} Mp3,lagu {{ data.fulltitle }},{{ data.fulltitle }} mp3,lirik lagu {{ data.fulltitle }}, music video {{ data.fulltitle }}, download {{ data.fulltitle }} free song{% endset %}
{% set ogimage %}
<meta property="og:image" content="https://ytimg.googleusercontent.com/vi/{{ data.video_id }}/hqdefault.jpg">
{% endset %}
<?php 
function xrvel_curl($url) { 
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
    curl_setopt($ch, CURLOPT_HEADER, false); 
    @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
    @curl_setopt($ch, CURLOPT_MAXREDIRS, 2); 
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6'); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__).'/cookie.txt'); 
    curl_setopt($ch, CURLOPT_COOKIEFILE, dirname(__FILE__).'/cookie.txt'); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 30); 
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_REFERER, $url); 
    $res = trim(curl_exec($ch)); 
    curl_close($ch); 
    unset($ch); 
    return $res; 
} 
 
function my_get_google_hot_trend($country_code) { 
    $result = array( 
        'data' => array(), 
        'error' => '' 
    ); 
 
    $res = xrvel_curl('http://www.google.com/trends/hottrends/widget?pn='.$country_code.'&tn=50&h=413'); 
 
    if ($res == '') { 
        $result['error'] = 'Failed. Empty response.'; 
        return $result; 
    } 
 
    if (!preg_match_all("/\<span class='widget-title-in-list'\>(.*)\<\/span\>\<\/span\>\<span class='widget-list-more-arrow/siU", $res, $match)) { 
        $result['error'] = 'Failed to parse.'; 
        return $result; 
    } 
 
    $keywords = $match[1]; 
 
    $result['data'] = $keywords; 
    return $result; 
} 
 
$keyword = my_get_google_hot_trend('p19'); 
 
echo '{% set topsearch = {
';
foreach ($keyword['data'] as &$value) {
    $n=rand(0,100000);
echo ''.$n.': {title: "'.str_replace(',','',str_replace('"','',$value)).'"},
';
}
echo '
} %}';
?>
                  <?php
$content=file_get_contents('http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topsongs/limit=15/json'); 
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
 
<body>
 
{{ block( 'header' ) }}
{{ block( 'search' ) }}
 
 
    {% if data %}
  <div class="wrapper"><div class="menu-home"><h2 class="title-menu">Download Section</h2>
<div class="notifin">
Download <strong>{{ data.fulltitle|raw }}</strong> as video and song. This content is free of copyright, <b>WBlog</b> is a search engine based on internet result.
</div>
  <div class="menulist">
<div style="border-top:0px dashed #ddd;margin:20px 0px 5px;padding:5px 3px;"><div id="play" align="center">
<center>
<img width="50px" src="http://i.ytimg.com/vi/{{ data.video_id }}/1.jpg" alt="Thumbnail 1"><img width="50px" src="http://i.ytimg.com/vi/{{ data.video_id }}/2.jpg" alt="Thumbnail 2"><img width="50px" src="http://i.ytimg.com/vi/{{ data.video_id }}/3.jpg" alt="Thumbnail 3">
<br>
<br>
<iframe src="https://www.youtube.com/embed/{{ data.video_id }}" frameborder="0" width="80%" height="100%" allowfullscreen=""></iframe></center>
</div></div><center><a href="http://facebook.com/dialog/feed?display=touch&amp;app_id=163741137001917&amp;redirect_uri=http%3A%2F%2Ffacebook.com&amp;caption=WBlog&amp;link={{ url }}" title="Share {{ data.fulltitle }} to Facebook" target="_blank"><img alt="Facebook" src="https://1.bp.blogspot.com/-rn6pUAdkiXk/WlhctuPnuxI/AAAAAAAABHk/1qs3xQWDp-szAsZdJjM-zinFQuwee0KtgCEwYBhgL/s1600/share%2Bto%2Bfacebook.png" height="28"></a>
<a href="https://twitter.com/share?url={{ url }}&amp;text=WBlog - Download {{ data.fulltitle|raw }}&amp;related=http://wblog.viwap.com" title="Share {{ data.fulltitle }} to Twitter" target="_blank"><img alt="Twitter" src="https://4.bp.blogspot.com/-BryZVrdqJ5A/WCyEgpI-s8I/AAAAAAAAAbs/WY5OddyZ7BMQ0Fl2x9bh3WI3UXbpEPEdQCPcBGAYYCw/s1600/twitter.png" height="28"></a>
<a href="http://plus.google.com/share?url={{ url }}" title="Share {{ data.fulltitle|raw }} to Google+" target="_blank"><img alt="Google+" src="https://4.bp.blogspot.com/-kUvdCZ1WdHw/WlhdTgwryEI/AAAAAAAABHw/c6bFvqM1wuAh9_OBONMRNW6lc6VVk5RFQCEwYBhgL/s1600/share%2Bto%2Bgoogle-plus.png" height="28"></a> <a href="http://pinterest.com/pin/create/button/?url={{ url }}&amp;description=Download {{ data.fulltitle }}" title="Share {{ data.fulltitle }} to Pinterest" target="_blank"><img alt="Pinterest" src="https://2.bp.blogspot.com/-1f4Co4h4FjM/Wlhd_rDk_XI/AAAAAAAABIA/FF-SZZqGiLEo6PDYsJi6-_UGwVjBJPk0gCEwYBhgL/s1600/share%2Bto%2Bpinterest.png" height="28"></a></center><h3 class="pageku"><center>{{ data.fulltitle }}</center></h3>
    <table style="font-size:14px;padding:2px;" width="100%"><tbody><tr valign="top"><td width="30%">Name</td><td>:</td><td><b>{{ data.fulltitle }}</b></td></tr><tr valign="top"><td width="30%">Category</td><td>:</td><td><b>{{ data.categories.0|raw }}</b></td></tr><tr valign="top"><td width="30%">Artist</td><td>:</td><td><b><a href="/music/{{ data.uploader|raw }}" target="_blank" title="Free Download All {{ data.uploader|raw }}">{{ data.uploader|raw }}</a></b></td></tr><tr valign="top"><td width="30%">Date</td><td>:</td><td>{{ data.upload_date|date('Y M d') }}</td></tr><tr valign="top"><td width="30%">Duration</td><td>:</td><td>{{ data.duration|gmdate('H:i:s') }}</td></tr><tr valign="top"><td width="30%">Size</td><td>:</td><td>Based Quality</td></tr><tr valign="top"><td width="30%">Rate</td><td>:</td><td>-</td></tr><tr valign="top"><td width="30%">Hits</td><td>:</td><td>-</td></tr><tr valign="top"><td width="30%">Encoder</td><td>:</td><td>PideWAP</td></tr></tbody></table>
    <br> <a class="btn-cloud" rel="nofollow" href="http://dolohen.com/afu.php?zoneid=2479541">FAST DOWNLOAD</a>
     <a class="btn-cloud" rel="nofollow" href="https://cdn-waphan.herokuapp.com/adl.php?id={{ data.video_id }}&type=mp4">Download 360p - mp4</a><a class="btn-cloud" rel="nofollow" href="https://cdn-waphan.herokuapp.com/adl.php?id={{ data.video_id }}&type=m4a">Download mp3 - 128kbps</a><a class="btn-cloud" rel="nofollow" href="https://www.convertmp3.io/fetch/?video=https://www.youtube.com/watch?v={{ data.video_id }}">ALTERNATIVE LINK (mp3)</a></div>
 
<div class="notifin">Free download video and song entitled <strong>{{ data.fulltitle|raw }}</strong> from <b>WBlog</b> search engine. Content is automatically generated by system.</div>
 
<div class="title-menu"><b>Share</b></div>
    <center>URL Code<br><textarea>{{ url }}</textarea><br>Forum Code<br> <textarea>[url={{url }}]Download {{ data.fulltitle|raw }}[/url]</textarea><br>HTML Code<br><textarea>&lt;a href="{{ url }}"&gt;Download {{ data.fulltitle|raw }}&lt;/a&gt;</textarea></center>
  
    <div class="title-menu"><b>Related Contents</b></div>
    {% if vsp_last_viewed_videos|length > 0 %}
    {% for video in vsp_last_viewed_videos|slice(0, 10) %}
<div class="menulist"><table><tbody>
<tr valign="middle">
<td valign="top"></td>
<td valign="top">
<div style="font-size:14px;"><a href="/download/music/{{ video.id }}/linkdownload.html">{{ video.title|raw }}</a></div>
</td>
</tr>
</tbody>
</table>
</div>
                    {% endfor %}
    {% endif %}
    
    {% else %}
        <p>Something went wrong. Please come back later.</p>
    {% endif %}
</div><div class="menu-sidebar"><h3 class="title-menu">Song Categories</h3>
<div class="notifin">This is the popular search by users, not all categories appear. You must use search bar to find any content from all around of internet.</div>
    <div class="menulist"><table><tbody>
<tr valign="middle">
<td valign="top"></td>
<td valign="top">
<div style="font-size:14px;">» <a href="/toplist.html" title="TOP List">TOP List</a></div>
</td>
</tr>
</tbody>
</table>
</div>
    <div class="menulist"><table><tbody>
<tr valign="middle">
<td valign="top"></td>
<td valign="top">
<div style="font-size:14px;">» <a href="/dangdut.html" title="Dangdut">Dangdut</a></div>
</td>
</tr>
</tbody>
</table>
</div>
    <div class="menulist"><table><tbody>
<tr valign="middle">
<td valign="top"></td>
<td valign="top">
<div style="font-size:14px;">» <a href="/kpop.html" title="K-POP">K-POP</a></div>
</td>
</tr>
</tbody>
</table>
</div>
    <div class="menulist"><table><tbody>
<tr valign="middle">
<td valign="top"></td>
<td valign="top">
<div style="font-size:14px;">» <a href="/jpop.html" title="J-POP">J-POP</a></div>
</td>
</tr>
</tbody>
</table>
</div>
  <div class="menulist"><table><tbody>
<tr valign="middle">
<td valign="top"></td>
<td valign="top">
<div style="font-size:14px;">» <a href="/cpop.html" title="C-POP">C-POP</a></div>
</td>
</tr>
</tbody>
</table>
</div>
    <div class="menulist"><table><tbody>
<tr valign="middle">
<td valign="top"></td>
<td valign="top">
<div style="font-size:14px;">» <a href="/india.html" title="India">India</a></div>
</td>
</tr>
</tbody>
</table>
</div>
    <div class="menulist"><table><tbody>
<tr valign="middle">
<td valign="top"></td>
<td valign="top">
<div style="font-size:14px;">» <a href="/anime.html" title="Anime">Anime</a></div>
</td>
</tr>
</tbody>
</table>
</div>
    <div class="menulist"><table><tbody>
<tr valign="middle">
<td valign="top"></td>
<td valign="top">
<div style="font-size:14px;">» <a href="/indo.html" title="Indo Pop">Indo Pop</a></div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="menulist"><table><tbody>
<tr valign="middle">
<td valign="top"></td>
<td valign="top">
<div style="font-size:14px;">» <a href="/malay.html" title="Malay Pop">Malay Pop</a></div>
</td>
</tr>
</tbody>
</table>
</div>
    
    <div class="title-menu">Trending Search</div>
      {% if top|length > 0 %}
{% for video in top|slice(0, 15) %}
    <div class="menulist"><table><tbody>
<tr valign="middle">
<td valign="top"></td>
<td valign="top">
<div style="font-size:14px;"><a title="{{ video.title|raw }} - {{ video.artist|raw }}" href="/music/{{ video.title|raw|lower|replace({' ':"-"}) }}-{{ video.artist|raw|lower|replace({' ':"-"}) }}">{{ video.title|raw }} - {{ video.artist|raw }}</a></div>
</td>
</tr>
</tbody>
</table>
</div>
      {% endfor %}
      
    {% endif %}
    
    {{ block ('recent_searches') }}
</div></div>
 
{{ block( 'footer' ) }}
 
</body></textarea>
                <button class="pure-button button-default pure-u-1-1" type="submit">Save file</button>
            </form>
