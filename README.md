# PHP cURL ile Veri Gönderme (Otomatik Form Doldurma)

PHP kullanarak başka sitedeki form elemanına verileri post etme ve post işlemi sonucunda geriye dönen verileri elde ediyoruz.

Başka sitedeki formda ′kullanici_adi′ ve ′kullanici_sifre′ name özellikli text tipinde input elemanlarının olduğunu düşünelim. Bunun için bir dizi oluşturuyoruz ve bu alanlara yazılması gereken değerleri belirtiyoruz.

    $form_degerleri = array(
	'kullanici_eposta' => 'volkan@hotmail.com', 
	'kullanici_sifre' => '123456789'
);


Şimdi bu verileri karşı siteye POST edebilmek için uygun formata dönüştürüp post işlemi için gerekli ayarlamaları yapmamız gerekiyor.

    $postVeri = http_build_query($form_degerleri); 
    $ayarlar = array('http' => array('method' => 'POST', 'header' => 'Content-Type: application/x-www-form-urlencoded', 'content' => $postVeri));
    $formAyar = stream_context_create($ayarlar);

Verileri post edeceğimiz sayfanın tam URL adresini bir değişkene atıyoruz.

    $url = 'https://domain.com/login.php';

Ardından file_get_contents fonksiyonu ile belirtilen sayfaya POST işlemi gerçekleştiriliyor ve işlem sonucunda geriye dönen sonucu elde ediyoruz. Bu sonucu bir değişkene atıyoruz ve ekrana yazdırıyoruz.

	$sonuc = file_get_contents($url, false, $formAyar);
	echo $sonuc;

Buraya kadar, başarılı bir şekilde gönderim sağladık.
