<?php

//Form sayfasında form elemanlarının name özellikleri ve bu alanlara girilecek veriler
$form_degerleri = array(
	'kullanici_eposta' => 'volkan@hotmail.com', 
	'kullanici_sifre' => '123456789'
);
//Veriler POST edilebilmesi için uygun formata dönüştürülüyor ve form POST işlemi için gerekli ayarlamalar yapılıyor
$postVeri = http_build_query($form_degerleri); 
$ayarlar = array('http' => array('method' => 'POST', 'header' => 'Content-Type: application/x-www-form-urlencoded', 'content' => $postVeri));
$formAyar = stream_context_create($ayarlar);

$url = 'https://domain.com/login.php'; //Post edilecek form sayfası tam URL adresi
$sonuc = file_get_contents($url, false, $formAyar); //Istenilen sayfada POST işlemi yapılıp, işlem sonucu ekrana basılan sayfanın içeriği elde ediliyor
echo $sonuc; //Elde edilen tüm veriler yazdırılıyor.

?>