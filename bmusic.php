<a href="/bmain.php">bmain.php</a>||<a href="/bmusic.php">bmusic.php</a>||<a href="/bcat.php?id=top">bcat.php</a><br><br>

<form class="pure-form pure-form-stacked" action="https://wap4.co/site/4775/pack/81430?tab=file_edit&amp;file=%2Fmusic" method="post">
                <textarea id="code" name="contents" style="width: 100%; min-height: 200px" rows="35">{% set desc = 'Download semua lagu MP3 ' ~ search_term|title ~ ' full album dan juga video dengan gratis dan mudah, unduh musik video ' ~ search_term|title ~ ' terbaru dengan sekali klik' %}
{% set title = 'Download ' ~ search_term|title ~ ' [Lagu MP3 + Video] - Bursa MP3' %}
{% set kw %}{{ search_term|title }},Download {{ search_term|title }} Mp3,lagu {{ search_term|title }},{{ search_term|title }} mp3,lirik lagu {{ search_term|title }}, music video {{ search_term|title }}, download {{ search_term|title }} free song{% endset %}
{% set ogimage %}
{% for vi in videos|slice(0, 1) %}
&lt;meta property="og:image" content="https://ytimg.googleusercontent.com/vi/{{ vi.video_id }}/hqdefault.jpg"&gt;{% endfor %}
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

echo '{% set top = {
';
foreach ($keyword['data'] as &$value) {
    $n=rand(0,100000);
echo ''.$n.': {title: "'.str_replace(',','',str_replace('"','',$value)).'"},
';
}
echo '
} %}
';
?>
{% use '_blocks' %}

{{ block( 'head_tags' ) }}

&lt;body&gt;

{{ block( 'search' ) }}
  &lt;div align="left"&gt;&lt;div id="k"&gt;
&lt;div class="note2" style="margin:3px;align:left;"&gt;&lt;a href="/"&gt;&lt;b&gt;Bursa MP3&lt;/b&gt;&lt;/a&gt; adalah mesin pencari video terlengkap yang bisa disimpan dan dikonversi menjadi MP3 atau lagu. Sistem situs otomatis menelusuri konten paling relevan dan mengambilnya untuk ditampilkan kepada pengunjung.&lt;/div&gt;
&lt;/div&gt;&lt;/div&gt;
  &lt;div id="k"&gt;
&lt;h3 class="title"&gt;Hasil Pencarian&lt;/h3&gt;
    {% if videos|length &gt; 0 %}
            {% for video in videos %}
  &lt;div class="indie-list1"&gt;
&lt;table&gt;
&lt;tbody&gt;&lt;tr valign="top"&gt;
&lt;td class="indie-list-gambar"&gt;
&lt;img class="thumb1" src="http://i.ytimg.com/vi/{{ video.video_id }}/1.jpg" alt="Cover"&gt;
&lt;/td&gt;
&lt;td class="indie-list-list"&gt; &lt;b&gt;{{ video.title|raw }}.mp4&lt;/b&gt;&lt;br&gt;oleh: {{ video.channel|raw }}&lt;/td&gt;
&lt;td align="center" width="14%"&gt;
&lt;div style="background:#f1f1f1;padding:0px;color:#f9f9f9"&gt;&lt;a href="/download/music/{{ video.video_id }}/linkdownload.html" class="bt"&gt;Download&lt;/a&gt;&lt;/div&gt;&lt;/td&gt;
&lt;/tr&gt;
&lt;/tbody&gt;&lt;/table&gt;&lt;/div&gt;
            {% endfor %}
    {% else %}
        &lt;small&gt;No videos found with "{{ search_term }}" term.&lt;/small&gt;
    {% endif %}

    {{ block ('recent_searches') }}
    
{% if top|length &gt; 0 %}
    &lt;div id="k"&gt;
&lt;h3 class="title"&gt;Pencarian Populer&lt;/h3&gt;
&lt;div id="indie"&gt;&lt;div class="menu"&gt;
{% for vidd in top|slice(0, 15) %}
    &lt;a href="/music/{{ vidd.title|lower|replace({'  ':"-",' ':"-"}) }}"&gt;{{ vidd.title }}&lt;/a&gt;
   {% endfor %}
    &lt;/div&gt;&lt;/div&gt;&lt;/div&gt;
    {% endif %}
&lt;/div&gt;

{{ block( 'footer' ) }}

&lt;/body&gt;</textarea>
                <button class="pure-button button-default pure-u-1-1" type="submit">Save file</button>
            </form>
