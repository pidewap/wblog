P
Java
Python
Javascript
Git

author Ahmad Muahrdian · update terakhir 05 Jul 2017
Cara Menggunakan CURL untuk Melakukan HTTP Request di PHP
# PHP # Curl
Python Pip

Agar dapat berkomunikasi dengan aplikasi yang lain, aplikasi kita harus mampu melakukan HTTP Request.

Misalnya:

Saat ada input barang terbaru, maka langsung di posting otomatis ke Twitter.

User (Input Barang) --> Aplikasi --> API Twitter
Hal ini harus dilakukan melalui HTTP Request, karena sebagian besar web service atau API menggunakan protokol HTTP.

Salah satu library yang kita bisa gunakan untuk melakukan HTTP Request di PHP adalah CURL.


 
Apa itu Curl?
Curl adalah sebuah program dan library untuk mengirim dan mengambil data melalui URL.

Curl adalah sebuah program:

Aritnya curl adalah sebuah program atau tools yang digunakan pada command line (CMD).

curl https://www.petanikode.com
Curl adalah sebuah libarary:

Artinya sekumpulan fungsi-fungsi curl yang dibungkus dalam paket libcurl dan bisa digunakan dalam berbagai macam bahasa pemrograman.

Contoh Penerapan Curl
Curl untuk membuat Bot, msialnya Bot Telegram untuk mengetahui cuaca…

Peran Curl pada Pembuatan Bot

Agar server bot bisa mengambil data dari server lain, maka dia harus mampu membuat Http Request, di sinilah Curl digunakan.

Tidak hanya untuk itu saja penerapan Curl…

Bisa juga diterapkan untuk:

Mengambil halaman web lalu mengubahnya jadi PDF;
Upload dan Download File;
Melakukan Login;
Scrape;
dan sebagainya.
Sejarah Singkat Curl
Curl awalnya bernama HttpGet dari versi pertama sampai ke-3.

HttpGet awalnya hanya mendukung protokol Http saja…

…lalu semakin berkembang dan banyak protokol yang ditambahkan.

Akhirnya pada rilis versi yang ke-4, nama HttpGet tidak lagi digunakan.

Sekarang namanya adalah Curl (mulai ditetapkan pada 20 Maret 1998).

Diberikan nama Curl, karena digunakan untuk download/upload data melalui URL.

Huruf “c” artinya “See” (melihat), jadi kalau cURL di-eja menjadi “See URL”. Selain itu, huruf “c” juga mengacu kepada client.

Instalasi dan Konfigurasi Curl
Seperti yang kita ketahui, ada dua bentuk curl: program dan library.

Jika ingin menginstal programnya, maka gunakan perintah:

apt install curl
Tapi jika ingin menginstal library untuk PHP, maka gunakan perintah:

apt install php-curl
Pada Linux, curl akan otomatis diaktifkan.

Kita bisa mengeceknya dengan kode ini:

<?php

phpinfo();

?>
Silahkan taruh di htdocs atau /var/www/html dan cobalah buka melalui localhost.

Jika muncul seperti ini, berarti curl sudah aktif dan bisa digunakan.

Cek Curl di PHP

Sedangkan untuk Windows (XAMPP), library curl sudah terinstal…

…tinggal kita aktifkan saja.

Caranya:

Silahkan buka file-file ini dengan teks editor.

C:\Program Files\xampp\apache\bin\php.ini
C:\Program Files\xampp\php\php.ini
C:\Program Files\xampp\php\php5\php.ini
Kemudian cari baris yang ini:

;extension=php_curl.dll
Silahkan dihapus titik-komanya (;).

extension=php_curl.dll
Simpan…

Setelah itu, restart server apache…maka sekarang Curl sudah aktif.

Cara Menggunakan Curl pada PHP
Ada 4 langkah penggunaan Curl di PHP:

Inisialisasi;
Set Option;
Eksekusi Curl;
Tutup Curl;
Setiap kita ingin menggunakan fungsi Curl, kita haru melakukan inisialisasi terlebih dahulu dengan cara seperti ini:

<?php 
// create curl resource 
$ch = curl_init(); 
Fungsi yang digunakan untuk melakukan inisialisasi adalah curl_init().

Setelah itu, kita harus memberikan nilai options seperti alamat URL yang akan dituju, format hasilnya, header, dll.

Untuk memberikan options, kita menggunakan fungsi curl_setopt() seperti ini:

 // set url 
curl_setopt($ch, CURLOPT_URL, "example.com"); 

//return the transfer as a string 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
Berikutnya melakukan eksekusi:

// $output contains the output string 
$output = curl_exec($ch); 
Pada tahapan eksekusi, Curl akan melakukan HTTP Request sesuai dengan options yang diberikan.

Fungsi yang digunakan untuk mengeksekusi Curl adalah curl_exec().

Karena kita sudah memberikan options hasil Curl akan berupa string, maka variabel $output akan berisi sebuah string.

Kita bisa melihat isinya dengan echo.

echo $output;
Terakhir menutup Curl dengan fungsi curl_close(), karena sudah tidak digunakan lagi.

// close curl resource to free up system resources 
curl_close($ch); 
Kode lengkapnya akan seperti ini:

<?php 
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, "example.com");

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // menampilkan hasil curl
    echo $output;
?>
Saat kita eksekusi skrip PHP di atas, maka akan menghasilkan seperti ini:

Contoh Hasil Eksekusi CURL

Halaman di atas didapat dari example.com.

Coba ubah URL-nya menjadi https://www.google.co.id/.

<?php 
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, "https://www.google.co.id/");

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // menampilkan hasil curl
    echo $output;
?>
Hasilnya:

Contoh Hasil Eksekusi CURL ke Google

Mmbungkus Curl dalam Fungsi
Baru kode di atas bisa kita buat dalam bentuk fungsi agar tidak diketik ulang terus menerus.

Fungsinya akan menjadi seperti ini:

<?php

function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
}
Lalu kita tinggal gunakan seperti ini:

<?php

$data = http_request("https://www.petanikode.com/");
Mengambil Data JSON dengan Curl
Biasanya webservice menyediakan data berupa JSON. Data JSON ini bisa kita ambil dengan CURL, lalu melakukan parse dengan fungsi json_decode().

Contoh:

Kita akan mengambil data JSON dari Github: https://api.github.com/users/petanikode

<?php

function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
}

$profile = http_request("https://api.github.com/users/petanikode");

// ubah string JSON menjadi array
$profile = json_decode($profile, TRUE);

echo "<pre>";
print_r($profile);
echo "</pre>";
Perhatikan options yang kita berikan pada contoh di atas…

Kita memberikan option user agent, karena untuk mengakses API Github, kita harus menyertakan user agent.

Hasilnya akan seperti ini:

Contoh Hasil Eksekusi CURL ke Github

Mengubah Data JSON ke HTML
Kita dapat melakukan apapun terhadap data yang kita dapatkan. Bisa disimpan ke database atau ditampilkan ke dalam HTML.

Seperti ini:

<?php

function http_request($url){
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, $url);
    
    // set user agent    
    curl_setopt($ch,CURLOPT_USERAGENT,'Nokia7610/2.0 (5.0509.0) SymbianOS/7.0s Series60/2.1 Profile/MIDP-2.0 Configuration/CLDC-1.0');

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // mengembalikan hasil curl
    return $output;
}

$profile = http_request("https://m.youtube.com");

// ubah string JSON menjadi array
$profilee = json_decode($profile, TRUE);
echo $profile;
?>
