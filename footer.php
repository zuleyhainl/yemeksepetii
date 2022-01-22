<?php 
function doubleDigit($text){
  return strlen(trim($text)) ==2?$text:"0".trim($text);
}
?>

<link rel="stylesheet" href="footer.css"/>
<footer class="main ys-footer ">
   <div class="top">
      <div class="container">
         <div class="row content">
            <div class="col-md-3 links">
               <ul>
                  <li><a href="/ankara/sss" data-yslinktracking="anasayfa:footer:sikca_sorulan_sorular">S.S.S. ve İşlem Rehberi</a></li>
                  <li><a href="/kullanici-sozlesmesi" data-yslinktracking="anasayfa:footer:kullanici_sozlesmesi">Kullanıcı Sözleşmesi</a></li>
                  <li><a href="/aydinlatma-metni" data-yslinktracking="anasayfa:footer:aydinlatma_metni">Aydınlatma Metni</a></li>
                  <li><a href="https://e-sirket.mkk.com.tr/esir/Dashboard.jsp#/sirketbilgileri/15069" target="_blank">Bilgi Toplumu Hizmetleri</a></li>
               </ul>
            </div>
            <div class="col-md-3 links">
               <ul>
                  <li><a href="/iletisim" data-yslinktracking="anasayfa:footer:iletisim">İletişim</a></li>
                  <li><a href="/ankara/cankaya-kultur-mah-yemek-firsatlari" data-yslinktracking="anasayfa:footer:firsatlar">Fırsatlar</a></li>
                  <li><a href="https://portakal.yemeksepeti.com" target="_blank">Restoran Portal</a></li>
                  <li><a href="/restoran-oner" data-yslinktracking="anasayfa:footer:restoran_oner">Restoran Öner</a></li>
               </ul>
            </div>
            <div class="col-md-3 links">
               <ul>
                  <li><a href="/ankara/mutfaklar-zincir-restoranlar" data-yslinktracking="anasayfa:footer:menuler">Mutfaklar &amp; Zincir Restoranlar</a></li>
                  <li><a href="/mobil" data-yslinktracking="anasayfa:footer:mobil">Mobil</a></li>
                  <li><a target="_blank" href="https://mahalle.yemeksepeti.com/on-kayit/" data-yslinktracking="anasayfa:footer:mahalle_basvuru">Yemeksepeti Mahalle Başvuru</a></li>
               </ul>
            </div>
            <div class="col-md-3 change-city col-md-offset-4">
               <a href="/sehir-secim" class="ys-btn ys-btn-changeCity" data-yslinktracking="anasayfa:footer:sehir_degistir"><?=doubleDigit($_SESSION["city_id"])?> <span>ŞEHİR DEĞİŞTİR </span></a> 
               <!-- <div class="changeLanguage"> <a href="/en/ankara" data-yslinktracking="anasayfa:footer:dil"><span class="prefix selectEnglish">EN</span><span class="selectEnglishTitle">English</span></a> </div> -->
            </div>
         </div>
      </div>
   </div>

</footer>