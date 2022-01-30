-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: yemeksepetidb
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Adana'),(2,'Adıyaman'),(3,'Afyonkarahisar'),(4,'Ağrı'),(5,'Amasya'),(6,'Ankara'),(7,'Antalya'),(8,'Artvin'),(9,'Aydın'),(10,'Balıkesir'),(11,'Bilecik'),(12,'Bingöl'),(13,'Bitlis'),(14,'Bolu'),(15,'Burdur'),(16,'Bursa'),(17,'Çanakkale'),(18,'Çankırı'),(19,'Çorum'),(20,'Denizli'),(21,'Diyarbakır'),(22,'Edirne'),(23,'Elazığ'),(24,'Erzincan'),(25,'Erzurum'),(26,'Eskişehir'),(27,'Gaziantep'),(28,'Giresun'),(29,'Gümüşhane'),(30,'Hakkari'),(31,'Hatay'),(32,'Isparta'),(33,'Mersin'),(34,'İstanbul'),(35,'İzmir'),(36,'Kars'),(37,'Kastamonu'),(38,'Kayseri'),(39,'Kırklareli'),(40,'Kırşehir'),(41,'Kocaeli'),(42,'Konya'),(43,'Kütahya'),(44,'Malatya'),(45,'Manisa'),(46,'Kahramanmaraş'),(47,'Mardin'),(48,'Muğla'),(49,'Muş'),(50,'Nevşehir'),(51,'Niğde'),(52,'Ordu'),(53,'Rize'),(54,'Sakarya'),(55,'Samsun'),(56,'Siirt'),(57,'Sinop'),(58,'Sivas'),(59,'Tekirdağ'),(60,'Tokat'),(61,'Trabzon'),(62,'Tunceli'),(63,'Şanlıurfa'),(64,'Uşak'),(65,'Van'),(66,'Yozgat'),(67,'Zonguldak'),(68,'Aksaray'),(69,'Bayburt'),(70,'Karaman'),(71,'Kırıkkale'),(72,'Batman'),(73,'Şırnak'),(74,'Bartın'),(75,'Ardahan'),(76,'Iğdır'),(77,'Yalova'),(78,'Karabük'),(79,'Kilis'),(80,'Osmaniye'),(81,'Düzce');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedbacks` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  `comment` varchar(500) COLLATE utf8_turkish_ci DEFAULT NULL,
  `rating_id` int(11) NOT NULL,
  `feedback_date` datetime NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbacks`
--

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;
INSERT INTO `feedbacks` VALUES (1,0,0,1,'Saat 11:00de verdiğim siparişim, restauranta 5 dk mesafede olan evime geldiğinde saat 12:00yi geçiyordu. Restaurantı ilk aradığımda siparişiniz çıkıyor dendi, yirmi dakika sonra ikinci sefer aradığımda hala çıkmadı aceleniz ne arayıp duruyorsunuz diye azar işittim. Ekmek kapısına saygı mükemmel!',0,'2022-01-08 00:00:00'),(2,0,0,1,'Herşeyiyle muhteşem bir de yan ürünleri geröekten özenle seçip koysanız muhteşem ötesi olacak eline sağlık usta baya iyi yapıyorsun pideleri.',0,'2022-01-08 00:00:00');
/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `res_id` int(11) NOT NULL,
  `menu_name` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `price` float NOT NULL,
  `menu_category_id` int(11) NOT NULL,
  `img_path` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,1,'Döner','Et döner. Salata, cacık, patates kızartması, irmik helvası ile',52,7,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/yildiz_aspava/doner_20210306122214_big.jpg'),(2,1,'Pilav Üstü Döner','Et döner. Salata, cacık, patates kızartması, irmik helvası ile',58,7,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/yildiz_aspava/pilavustudoner_20210306122420_big.jpg'),(3,1,'İskender','Et döner. Salata, cacık, patates kızartması, irmik helvası ile',58,7,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/yildiz_aspava/Iskender_20210306122238_big.jpg'),(4,1,'Coca-Cola (33 cl.)','',10,6,'https://cdn.yemeksepeti.com/ProductImages/icecek/cocacola33cl_big.jpg'),(5,3,'Et Şiş','Közlenmiş domates, közlenmiş biber, salata, patates kızartması, cacık, helva ile',67,0,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/meshurgulcimenaspava/etsis_20210413141004_big.jpg'),(6,3,'Adana Kebap','Közlenmiş domates, közlenmiş biber, salata, patates kızartması, cacık, helva ile',55,0,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/meshurgulcimenaspava/meshurgulcimenaspavaemek_adanakebap_20200911000953_big.jpg'),(7,3,'Alinazik Kebap (Kuzu Şişten)','Közlenmiş domates, közlenmiş biber, salata, patates kızartması, cacık, helva ile',70,0,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/meshurgulcimenaspava/meshurgulcimenaspavaemek_alinazikkebapkuzusisten_20200919220946_big.jpg'),(8,3,'Beyti Kebap','Közlenmiş domates, közlenmiş biber, salata, patates kızartması, cacık, helva ile',60,0,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/meshurgulcimenaspava/meshurgulcimenaspavaemek_beytikebap_20200919220907_big.jpg'),(9,3,'Tavuk Kanat','Közlenmiş domates, közlenmiş biber, salata, patates kızartması, cacık, helva ile',52,0,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/meshurgulcimenaspava/meshurgulcimenaspavaemek_tavukkanat_20200919220948_big.jpg'),(10,3,'Kaşarlı Mantarlı Pide','Salata, patates kızartması, cacık, helva',49,0,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/meshurgulcimenaspava/meshurgulcimenaspavaemek_kasarlimantarlipide_20200919220934_big.jpg'),(11,3,'Coca-Cola Zero Sugar (33 cl.)','',10,0,'https://cdn.yemeksepeti.com/ProductImages/icecek/cocacolazerosugar33cl_big.jpg'),(12,3,'Ayran (33 cl.)','',9,0,'https://cdn.yemeksepeti.com/ProductImages/icecek/ayran33cl_big.jpg'),(14,1,'Şalgam Suyu (33 cl.)','',9,0,'https://cdn.yemeksepeti.com/ProductImages/icecek/salgamsuyu33cl_big.jpg'),(15,4,'Cheeseburger','140 gr. hamburger köftesi, turşu, domates, karamelize soğan, cheddar peyniri, Butchers sos. Patates kızartması, seçeceğiniz sos ile',32,0,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/butchersburger/cheeseburger_20210510013433_big.jpg'),(16,4,'Füme Burger','140 gr. hamburger köftesi, turşu, domates, karamelize soğan, cheddar peyniri, Butchers sos, füme kaburga. Patates kızartması, seçeceğiniz sos ile',36,0,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/butchersburger/fumeburger_20210427175447_big.jpg'),(17,4,'Mushroom Burger','140 gr. hamburger köftesi,turşu, domates, karamelize soğan, Butchers sos, cheddar peyniri, mantar. Patates kızartması, seçeceğiniz sos ile',34,0,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/butchersburger/mushroomburger_20210427175508_big.jpg'),(18,4,'Soğan Halkası (10 Adet)','',18,0,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/butchersburger/butchersburgercigdemmah._soganhalkasi10adet_20200202120228_big.jpg'),(19,4,'Patates Kızartması','',18,0,'https://cdn.yemeksepeti.com/ProductImages/TR_ANKARA/butchersburger/butchersburgercigdemmah._patateskizartmasi_20200202120222_big.jpg'),(20,4,'Pepsi (30 cl.)','',6,0,'https://cdn.yemeksepeti.com/ProductImages/icecek/pepsi30cl_big.jpg'),(21,4,'Ayran (30 cl.)','',5,0,'https://cdn.yemeksepeti.com/ProductImages/icecek/ayran30cl_big.jpg'),(22,4,'Ketçap','',2,0,'https://cdn.yemeksepeti.com/ProductImages/sos/ketcap_big.jpg'),(23,4,'Mayonez','',2,0,'https://cdn.yemeksepeti.com/ProductImages/sos/mayonez_big.jpg'),(24,4,'Barbekü Sos','',3,0,'https://cdn.yemeksepeti.com/ProductImages/sos/barbekusos_big.jpg'),(25,5,'Klasik Waffle','Özel Happiness hamuru; muz, kivi, çilek. Seçeceğiniz 3 adet malzeme 1 adet çikolata ',38,0,'https://cdn.yemeksepeti.com/restaurant/TR_ANKARA/happiness-break-waffle-baklava-cankaya-isci-bloklari-mah-100-yil/klasik-waffle_big.jpg'),(26,5,'Red Happiness','Özel Happiness hamuru; çilek, Oreo. Seçeceğiniz 3 adet malzeme 1 adet çikolata ile',39.5,0,'https://cdn.yemeksepeti.com/restaurant/TR_ANKARA/happiness-break-waffle-baklava-cankaya-isci-bloklari-mah-100-yil/cilek-hamurlu-waffle_big.jpg'),(27,5,'Brownie Waffle','Özel Happiness hamuru; muz, çilek, Oreo. Seçeceğiniz 3 adet malzeme ile',39.5,0,'https://cdn.yemeksepeti.com/restaurant/TR_ANKARA/happiness-break-waffle-baklava-cankaya-isci-bloklari-mah-100-yil/brownie-waffle_big.jpg'),(28,5,'Bardak Waffle','Özel Happiness hamuru; muz çilek. Seçeceğiniz 3 adet malzeme 1 adet çikolata ile',32,0,'https://cdn.yemeksepeti.com/restaurant/TR_ANKARA/happiness-break-waffle-baklava-cankaya-isci-bloklari-mah-100-yil/bardak-waffle_big.jpg'),(29,5,'Wonder Full','Özel happiness keki, Belçika çikolatası, beyaz çikolata, muz, çilek, krep kırığı, fındık kırığı, toz Antep fıstığı ile',31.5,0,'https://cdn.yemeksepeti.com/restaurant/TR_ANKARA/happiness-break-waffle-baklava-cankaya-isci-bloklari-mah-100-yil/wonder-full_big.jpg');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `total_cost` float(6,2) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `speed` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `flavor` int(11) NOT NULL,
  `res_id` int(11) NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant_menus`
--

DROP TABLE IF EXISTS `restaurant_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant_menus` (
  `res_menu_ID` int(11) NOT NULL AUTO_INCREMENT,
  `res_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`res_menu_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant_menus`
--

LOCK TABLES `restaurant_menus` WRITE;
/*!40000 ALTER TABLE `restaurant_menus` DISABLE KEYS */;
INSERT INTO `restaurant_menus` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5);
/*!40000 ALTER TABLE `restaurant_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurants` (
  `res_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `descriptions` varchar(1000) COLLATE utf8_turkish_ci NOT NULL,
  `img_path` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `opening` time NOT NULL,
  `closing` time NOT NULL,
  `min_price` int(6) NOT NULL,
  `service_time` int(3) NOT NULL,
  `phone_number` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `address` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `rating_id` int(11) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurants`
--

LOCK TABLES `restaurants` WRITE;
/*!40000 ALTER TABLE `restaurants` DISABLE KEYS */;
INSERT INTO `restaurants` VALUES (1,'Yıldız Aspava','Çevre Kanunu kapsamında yapılan değişiklikle her bir plastik poşetin en az 0,25 TL ek bedelle temin edilmesi Çevre ve Şehircilik Bakanlığı tarafından zorunlu hale getirilmiştir. Plastik poşet talep etmeniz halinde ürünü sepete eklemeniz gerekmektedir. Sepete eklenen her bir plastik poşet için ilgili bedel tarafınızdan tahsil edilecektir.','https://cdn.yemeksepeti.com/CategoryImages/TR_ANKARA/yildiz_aspava_big.gif','00:00:11','00:00:22',60,20,'','Çankaya (Emek Mah.)',NULL,6),(2,'Demet Aspava','Çevre Kanunu kapsamında yapılan değişiklikle her bir plastik poşetin en az 0,25 TL ek bedelle temin edilmesi Çevre ve Şehircilik Bakanlığı tarafından zorunlu hale getirilmiştir. Plastik poşet talep etmeniz halinde ürünü sepete eklemeniz gerekmektedir. Sepete eklenen her bir plastik poşet için ilgili bedel tarafınızdan tahsil edilecektir.','https://cdn.yemeksepeti.com/CategoryImages/TR_ANKARA/demet_big.gif','11:00:00','19:00:00',30,20,'','Yenimahalle (Yeşilevler Mah.)',NULL,6),(3,'Meşhur Gülçimen Aspava','Çevre Kanunu kapsamında yapılan değişiklikle her bir plastik poşetin en az 0,25 TL ek bedelle temin edilmesi Çevre ve Şehircilik Bakanlığı tarafından zorunlu hale getirilmiştir. Plastik poşet talep etmeniz halinde ürünü sepete eklemeniz gerekmektedir. Sepete eklenen her bir plastik poşet için ilgili bedel tarafınızdan tahsil edilecektir.  Sipariş öncesi son adım olan \"Sipariş Onayı\" sayfasındaki ilgili alandan, adresinizi \"Gel Al\" olarak seçtiğiniz takdirde, siparişinizi restoranın bulunduğu adrese giderek kendiniz teslim alabilirsiniz.','https://cdn.yemeksepeti.com/CategoryImages/TR_ANKARA/meshur-gulcimen-aspava2_big.gif','11:00:00','22:00:00',60,30,'','Çankaya (Emek Mah.)',NULL,6),(4,' Butcher\'s Burger','Sadece Yemeksepeti\'nde, tüm ürünlerde %35 indirim!  Sadece Yemeksepeti\'nde, \'Vodafone Menüsü (Hamburger )\' 47,5 TL yerine sadece 33 TL! Tüm Vodafone’lulara özel, indirimli Vodafone Menülerinden faydalanabilmek için, siparişi tamamlamadan önce Vodafone hattınızın numarasını ve Vodafone Yanımda mobil uygulaması Fırsatlar Dünyası bölümünden aldığınız şifreyi sorgu alanına girerek “Uygula”’ya tıklayın. İndirimlerin her seferinde şifre girerek değil otomatik olarak uygulanmasını istiyorsanız, ana sayfadaki “Vodafone Menüleri” butonuna tıklayarak, karşınıza çıkan görseldeki “Numaranı Gir” alanı ile numaranızı kaydedebilirsiniz. Aksi halde seçtiğiniz Vodafone Menüsü standart tutarı üzerinden indirimsiz fiyatlandırılacaktır.\r\nSadece Yemeksepeti\'nde, tüm ürünlerde %30 indirim!\r\n\r\nSadece Yemeksepeti\'nde, \'Şehre Dönüş Menüsü (Butcher\'s Antrikot Burger - 140 gr.)\' 59,5 TL yerine 38,65 TL!\r\n\r\nSadece Yemeksepeti\'nde, \'Şehre Dönüş Menüsü (Cheeseburger - 100 gr.)\' 49,5 TL yerine 32,17 TL!\r\n\r\nSadece Ye','https://cdn.yemeksepeti.com/CategoryImages/TR_ANKARA/butchersburger_big.gif','10:45:00','03:00:00',20,30,'','Çankaya (Çiğdem Mah.)',NULL,6),(5,'Happiness Break Waffle & Baklava',' Çevre Kanunu kapsamında yapılan değişiklikle her bir plastik poşetin en az 0,25 TL ek bedelle temin edilmesi Çevre ve Şehircilik Bakanlığı tarafından zorunlu hale getirilmiştir. Plastik poşet talep etmeniz halinde ürünü sepete eklemeniz gerekmektedir. Sepete eklenen her bir plastik poşet için ilgili bedel tarafınızdan tahsil edilecektir.','https://cdn.yemeksepeti.com/CategoryImages/TR_EDIRNE/happi_big.gif','12:00:00','23:59:00',25,20,'','Çankaya (İşçi Blokları)',NULL,6);
/*!40000 ALTER TABLE `restaurants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_card`
--

DROP TABLE IF EXISTS `shopping_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_card` (
  `shop_card_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total_cost` float(6,2) NOT NULL,
  `state` varchar(10) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`shop_card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_card`
--

LOCK TABLES `shopping_card` WRITE;
/*!40000 ALTER TABLE `shopping_card` DISABLE KEYS */;
/*!40000 ALTER TABLE `shopping_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-30 15:12:48
