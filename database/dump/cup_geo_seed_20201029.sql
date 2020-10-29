# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.2.15-MariaDB-10.2.15+maria~xenial-log)
# Database: vola_clickcart
# Generation Time: 2019-04-26 07:40:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cataloghi
# ------------------------------------------------------------

LOCK TABLES `cataloghi` WRITE;
/*!40000 ALTER TABLE `cataloghi` DISABLE KEYS */;

INSERT INTO `cataloghi` (`id`, `tipo`, `note`, `data`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,'CATALOGO DEALS',NULL,'2019-04-26',1,'2019-04-26 07:40:20','2019-04-26 07:40:20');

/*!40000 ALTER TABLE `cataloghi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cataloghi_cambi_piani
# ------------------------------------------------------------

LOCK TABLES `cataloghi_cambi_piani` WRITE;
/*!40000 ALTER TABLE `cataloghi_cambi_piani` DISABLE KEYS */;

INSERT INTO `cataloghi_cambi_piani` (`id`, `codice`, `tipologia`, `costo`, `frequenza`, `data_inizio`, `data_fine`, `catalogo_id`)
VALUES
	(1,1,'Mobile',19.90,NULL,'2018-12-05','2019-02-17',1),
	(2,2,'Tutti',0.00,NULL,'2018-12-05',NULL,1),
	(3,3,'Rete Fissa',4.00,'al mese per 48 mesi','2018-12-05',NULL,1),
	(4,4,'Rete Fissa',5.00,'al mese per 48 mesi','2018-12-05',NULL,1),
	(5,5,'Mobile',5.00,NULL,'2019-02-17',NULL,1);

/*!40000 ALTER TABLE `cataloghi_cambi_piani` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cataloghi_logiche_cambi_piani
# ------------------------------------------------------------

LOCK TABLES `cataloghi_logiche_cambi_piani` WRITE;
/*!40000 ALTER TABLE `cataloghi_logiche_cambi_piani` DISABLE KEYS */;

INSERT INTO `cataloghi_logiche_cambi_piani` (`id`, `piano_id`, `cambio_piano_id`)
VALUES
	(1,2,1),
	(2,2,2),
	(3,2,5),
	(4,10,1),
	(5,10,2),
	(6,10,5),
	(7,1,1),
	(8,1,2),
	(9,1,5),
	(10,9,1),
	(11,9,2),
	(12,9,5),
	(13,4,1),
	(14,4,2),
	(15,4,5),
	(16,3,1),
	(17,3,2),
	(18,3,5),
	(19,6,1),
	(20,6,2),
	(21,6,5),
	(22,5,1),
	(23,5,2),
	(24,5,5),
	(25,7,1),
	(26,7,2),
	(27,7,5),
	(28,8,1),
	(29,8,2),
	(30,8,5),
	(31,9,1),
	(32,9,2),
	(33,9,5),
	(34,10,1),
	(35,10,2),
	(36,10,5),
	(37,11,1),
	(38,11,2),
	(39,11,5),
	(40,12,1),
	(41,12,2),
	(42,12,5),
	(43,13,1),
	(44,13,2),
	(45,13,5),
	(46,14,1),
	(47,14,2),
	(48,14,5),
	(49,15,1),
	(50,15,2),
	(51,15,5),
	(52,16,1),
	(53,16,2),
	(54,16,5),
	(55,17,1),
	(56,17,2),
	(57,17,5),
	(58,18,1),
	(59,18,2),
	(60,18,5);

/*!40000 ALTER TABLE `cataloghi_logiche_cambi_piani` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cataloghi_logiche_opzioni
# ------------------------------------------------------------

LOCK TABLES `cataloghi_logiche_opzioni` WRITE;
/*!40000 ALTER TABLE `cataloghi_logiche_opzioni` DISABLE KEYS */;

INSERT INTO `cataloghi_logiche_opzioni` (`id`, `piano_id`, `opzione_id`)
VALUES
	(1,2,1),
	(2,2,2),
	(3,2,4),
	(4,10,2),
	(5,10,3),
	(6,10,6),
	(7,1,1),
	(8,1,2),
	(9,1,5),
	(10,9,7),
	(11,9,2),
	(12,9,5),
	(13,4,11),
	(14,4,2),
	(15,4,15),
	(16,3,13),
	(17,3,14),
	(18,3,5),
	(19,6,1),
	(20,6,4),
	(21,6,10),
	(22,5,9),
	(23,5,2),
	(24,5,6),
	(25,7,6),
	(26,7,2),
	(27,7,5),
	(28,8,1),
	(29,8,2),
	(30,8,5),
	(31,9,5),
	(32,9,2),
	(33,9,8),
	(34,10,8),
	(35,10,3),
	(36,10,5),
	(37,11,9),
	(38,11,4),
	(39,11,12),
	(40,12,1),
	(41,12,2),
	(42,12,15),
	(43,13,11),
	(44,13,2),
	(45,13,5),
	(46,14,10),
	(47,14,3),
	(48,14,6),
	(49,15,5),
	(50,15,7),
	(51,15,8),
	(52,16,8),
	(53,16,6),
	(54,16,3),
	(55,17,1),
	(56,17,2),
	(57,17,5),
	(58,18,1),
	(59,18,2),
	(60,18,5);

/*!40000 ALTER TABLE `cataloghi_logiche_opzioni` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cataloghi_opzioni
# ------------------------------------------------------------

LOCK TABLES `cataloghi_opzioni` WRITE;
/*!40000 ALTER TABLE `cataloghi_opzioni` DISABLE KEYS */;

INSERT INTO `cataloghi_opzioni` (`id`, `codice`, `nome`, `tipologia`, `dati_aggiuntivi`, `catalogo_id`)
VALUES
	(1,1,'+Speed 12GB',NULL,'{\"descrizione\":\"12 Giga in Italia e nell\\u2019Unione Europea\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63642\"}',1),
	(2,2,'Saturday Free',NULL,'{\"descrizione\":\"2 Giga in 4G ogni sabato per 12 mesi\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63643\"}',1),
	(3,3,'Relax For All',NULL,'{\"descrizione\":\"Minuti e SMS illimitati verso tutti\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63646\"}',1),
	(4,4,'Relax For All',NULL,'{\"descrizione\":\"Minuti e SMS illimitati verso tutti\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63646\"}',1),
	(5,5,'Vodafone Pass Mail','Vodafone Pass','{\"descrizione\":\"Leggi mail e scarichi allegati senza pensieri\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63801\"}',1),
	(6,6,'Vodafone Pass Mappe','Vodafone Pass','{\"descrizione\":\"Conosci sempre la direzione giusta, in ogni occasione\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63803\"}',1),
	(7,7,'Vodafone Pass Musica','Vodafone Pass','{\"descrizione\":\"Ascolti la musica che vuoi, \\nanche lontano dalla scrivania\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63804\"}',1),
	(8,8,'Vodafone Pass Chat','Vodafone Pass','{\"descrizione\":\"Utilizzi le app di istant messaging senza consumare i tuoi Giga\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63805\"}',1),
	(9,9,'Vodafone Pass Social','Vodafone Pass','{\"descrizione\":\"Porti il tuo business anche sui Social Network e resti in contatto con i tuoi clienti.\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63833\"}',1),
	(10,10,'Vodafone Pass Video','Vodafone Pass','{\"descrizione\":\"Guarda tutti i film e i video che vuoi\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63834\"}',1),
	(11,11,'Extra 1GB 4G','Extra GB','{\"descrizione\":\"1 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63835\"}',1),
	(12,12,'Extra 2GB 4G','Extra GB','{\"descrizione\":\"2 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63836\"}',1),
	(13,20,'Extra 2GB 4G','Extra GB','{\"descrizione\":\"2 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63836\"}',1),
	(14,13,'Extra 4GB 4G','Extra GB','{\"descrizione\":\"4 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63837\"}',1),
	(15,15,'Extra 5GB 4G','Extra GB','{\"descrizione\":\"5 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63867\"}',1),
	(16,14,'Extra 6GB 4G','Extra GB','{\"descrizione\":\"6 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63838\"}',1),
	(17,16,'Extra 15GB 4G','Extra GB','{\"descrizione\":\"15 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63868\"}',1),
	(18,19,'Extra 15GB 4G','Extra GB','{\"descrizione\":\"15 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63868\"}',1),
	(19,17,'Extra 20GB 4G','Extra GB','{\"descrizione\":\"20 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63869\"}',1),
	(20,18,'Extra 30GB 4G','Extra GB','{\"descrizione\":\"30 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63870\"}',1),
	(21,21,'Extra 40GB 4G','Extra GB','{\"descrizione\":\"40 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63915\"}',1),
	(22,22,'Extra 2GB 4G con Telefono','Extra GB','{\"descrizione\":\"2 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63916\"}',1),
	(23,23,'Super Internet 1GB',NULL,'{\"descrizione\":\"1 Giga in 4G\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63917\"}',1),
	(24,24,'SMS Illimitati',NULL,'{\"descrizione\":\"SMS illimitati verso tutti\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63933\"}',1),
	(25,25,'Zero Mondo 10','Zero Mondo','{\"descrizione\":\"100 minuti in entrata, 100 minuti in uscita, 100 SMS e 100MB validi in tutto il mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63934\"}',1),
	(26,26,'Zero Mondo 20','Zero Mondo','{\"descrizione\":\"200 minuti in entrata, 200 minuti in uscita, 200 SMS e 200MB validi in tutto il mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63938\"}',1),
	(27,27,'Zero Mondo 30','Zero Mondo','{\"descrizione\":\"300 minuti in entrata, 300 minuti in uscita, 300 SMS e 300MB validi in tutto il mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63939\"}',1),
	(28,28,'Zero Mondo 50','Zero Mondo','{\"descrizione\":\"Minuti, SMS illimitati e 20 Giga in Europa. 500 minuti in entrata, 500 minuti in uscita, 500 SMS e 500MB validi nel resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63940\"}',1),
	(29,29,'Travel Europa, Usa, Canada',NULL,'{\"descrizione\":\"Minuti, SMS illimitati e 2 Giga\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63941\"}',1),
	(30,30,'Red USA',NULL,'{\"descrizione\":\"200 minuti in entrata, 200 minuti in uscita, 100 SMS e 300 Mega validi in USA\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63942\"}',1),
	(31,31,'Red Top Travel',NULL,'{\"descrizione\":\"100 minuti in entrata, 100 minuti in uscita, 100 SMS e 500 Mega\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63943\"}',1),
	(32,32,'Open: Travel Extra Europa',NULL,'{\"descrizione\":\"500 minuti, 500 SMS e 500 Mega validi in tutto il mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63944\"}',1),
	(33,33,'Zero: Travel Extra Europa',NULL,'{\"descrizione\":\"500 minuti, 500 SMS e 500 Mega validi in tutto il mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63945\"}',1),
	(34,34,'International Call',NULL,'{\"descrizione\":\"2000 minuti verso tutto il mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63947\"}',1),
	(35,35,'Raddoppio Giga',NULL,'{\"descrizione\":\"Raddoppi i Giga della tua offerta\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63964\"}',1);

/*!40000 ALTER TABLE `cataloghi_opzioni` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cataloghi_opzioni_dettagli
# ------------------------------------------------------------

LOCK TABLES `cataloghi_opzioni_dettagli` WRITE;
/*!40000 ALTER TABLE `cataloghi_opzioni_dettagli` DISABLE KEYS */;

INSERT INTO `cataloghi_opzioni_dettagli` (`id`, `opzione_id`, `costo_pieno`, `frequenza`, `sconto`, `costo_scontato`, `validita_sconto`, `data_inizio`, `data_fine`)
VALUES
	(1,1,5.00,'al mese',NULL,5.00,NULL,'2018-12-05',NULL),
	(2,2,3.50,'al mese per 12 mesi',NULL,3.50,NULL,'2018-12-05',NULL),
	(3,3,5.00,'al mese',NULL,5.00,NULL,'2018-12-05',NULL),
	(4,4,0.00,'al mese',NULL,0.00,NULL,'2018-12-05',NULL),
	(5,5,3.00,'al mese',NULL,3.00,NULL,'2018-12-05',NULL),
	(6,5,3.00,'al mese','50%',1.50,'per 24 mesi','2018-12-05',NULL),
	(7,5,3.00,'al mese','100%',0.00,'per 24 mesi','2018-12-05',NULL),
	(8,6,3.00,'al mese',NULL,3.00,NULL,'2018-12-05',NULL),
	(9,6,3.00,'al mese','50%',1.50,'per 24 mesi','2018-12-05',NULL),
	(10,6,3.00,'al mese','100%',0.00,'per 24 mesi','2018-12-05',NULL),
	(11,7,3.00,'al mese',NULL,3.00,NULL,'2018-05-12',NULL),
	(12,7,3.00,'al mese','50%',1.50,'per 24 mesi','2018-05-12',NULL),
	(13,7,3.00,'al mese','100%',0.00,'per 24 mesi','2018-05-12',NULL),
	(14,8,3.00,'al mese',NULL,3.00,NULL,'2018-05-12',NULL),
	(15,8,3.00,'al mese','50%',1.50,'per 24 mesi','2018-05-12',NULL),
	(16,8,3.00,'al mese','100%',0.00,'per 24 mesi','2018-05-12',NULL),
	(17,9,3.00,'al mese',NULL,3.00,NULL,'2018-05-12',NULL),
	(18,9,3.00,'al mese','50%',1.50,'per 24 mesi','2018-05-12',NULL),
	(19,9,3.00,'al mese','100%',0.00,'per 24 mesi','2018-05-12',NULL),
	(20,10,10.00,'al mese',NULL,10.00,NULL,'2018-05-12',NULL),
	(21,10,10.00,'al mese','0.5',1.50,'per 24 mesi','2018-05-12',NULL),
	(22,10,10.00,'al mese','100%',0.00,'per 24 mesi','2018-05-12',NULL),
	(23,11,5.00,'al mese',NULL,5.00,NULL,'2018-05-15',NULL),
	(24,11,0.00,'al mese',NULL,0.00,NULL,'2018-05-15',NULL),
	(25,12,9.00,'al mese',NULL,9.00,NULL,'2018-05-12',NULL),
	(26,12,9.00,'al mese','5',4.00,'per 24 mesi','2018-05-12',NULL),
	(27,12,9.00,'al mese','50%',4.50,'per 24 mesi','2018-05-12',NULL),
	(28,12,9.00,'al mese','100%',0.00,'per 24 mesi','2018-05-12',NULL),
	(29,13,8.00,'al mese',NULL,8.00,NULL,'2018-05-12',NULL),
	(30,14,15.00,'al mese',NULL,15.00,NULL,'2018-05-12',NULL),
	(31,14,15.00,'al mese','5',10.00,'per 24 mesi','2018-05-12',NULL),
	(32,14,15.00,'al mese','50%',7.50,'per 24 mesi','2018-05-12',NULL),
	(33,14,15.00,'al mese','100%',0.00,'per 24 mesi','2018-05-12',NULL),
	(34,15,15.00,'al mese',NULL,15.00,NULL,'2018-05-12',NULL),
	(35,15,15.00,'al mese','5',10.00,NULL,'2018-05-12',NULL),
	(36,15,15.00,'al mese','50%',7.50,NULL,'2018-05-12',NULL),
	(37,16,20.00,'al mese',NULL,20.00,NULL,'2018-05-15',NULL),
	(38,16,20.00,'al mese','5',15.00,'per 24 mesi','2018-05-15',NULL),
	(39,16,20.00,'al mese','50%',10.00,'per 24 mesi','2018-05-15',NULL),
	(40,17,30.00,'al mese',NULL,30.00,NULL,'2018-05-15',NULL),
	(41,17,30.00,'al mese','5',25.00,'per 24 mesi','2018-05-15',NULL),
	(42,17,30.00,'al mese','50%',15.00,'per 24 mesi','2018-05-15',NULL),
	(43,18,20.00,'al mese',NULL,20.00,NULL,'2018-05-15',NULL),
	(44,19,50.00,'al mese',NULL,50.00,NULL,'2018-05-12',NULL),
	(45,19,50.00,'al mese','5',45.00,'per 24 mesi','2018-05-12',NULL),
	(46,19,50.00,'al mese','50%',25.00,'per 24 mesi','2018-05-12',NULL),
	(47,13,25.00,'al mese',NULL,25.00,NULL,'2018-05-12',NULL),
	(48,20,30.00,'al mese',NULL,30.00,NULL,'2018-05-12',NULL),
	(49,20,30.00,'al mese','5',25.00,'per 24 mesi','2018-05-12',NULL),
	(50,20,30.00,'al mese','50%',15.00,'per 24 mesi','2018-05-12',NULL),
	(51,21,80.00,'al mese',NULL,80.00,NULL,'2018-05-12',NULL),
	(52,22,7.00,'al mese',NULL,7.00,NULL,'2018-05-12',NULL),
	(53,23,9.00,'al mese',NULL,9.00,NULL,'2018-05-12',NULL),
	(54,24,2.00,'al mese',NULL,2.00,NULL,'2018-05-12',NULL),
	(55,25,10.00,'al mese',NULL,10.00,NULL,'2018-05-12',NULL),
	(56,26,20.00,'al mese',NULL,20.00,NULL,'2018-05-12',NULL),
	(57,27,30.00,'al mese',NULL,30.00,NULL,'2018-05-12',NULL),
	(58,28,50.00,'al mese',NULL,50.00,NULL,'2018-05-12',NULL),
	(59,29,10.00,'al mese',NULL,10.00,NULL,'2018-05-12',NULL),
	(60,30,15.00,'al mese',NULL,15.00,NULL,'2018-05-12',NULL),
	(61,31,35.00,'al mese',NULL,35.00,NULL,'2018-05-12',NULL),
	(62,32,70.00,'al mese',NULL,70.00,NULL,'2018-05-12',NULL),
	(63,33,70.00,'al mese',NULL,70.00,NULL,'2018-05-12',NULL),
	(64,34,25.00,'al mese',NULL,25.00,NULL,'2018-05-12',NULL),
	(65,35,0.00,'al mese',NULL,0.00,NULL,'2018-05-12',NULL);

/*!40000 ALTER TABLE `cataloghi_opzioni_dettagli` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cataloghi_piani
# ------------------------------------------------------------

LOCK TABLES `cataloghi_piani` WRITE;
/*!40000 ALTER TABLE `cataloghi_piani` DISABLE KEYS */;

INSERT INTO `cataloghi_piani` (`id`, `tmcode`, `nome`, `tipologia`, `dati_aggiuntivi`, `catalogo_id`)
VALUES
	(1,'1622','Zero RAM Small','Mobile','{\"descrizione\":\"50 minuti e 50 SMS in Italia e in UE, 20 minuti e 50 SMS internazionali.\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63474\"}',1),
	(2,'1446','Zero RAM Micro New','Mobile','{\"descrizione\":\"100 minuti, 100 SMS, minuti illimitati verso i numeri dell\'azienda e 150 Mega in Italia e in UE, 20 minuti e 50 SMS internazionali\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63507\"}',1),
	(3,'1666','Zero Start+','Mobile','{\"descrizione\":\"100 minuti, 100 SMS, minuti illimitati verso i numeri dell\'azienda e 100 Mega in Italia e in UE, 20 minuti e 20 SMS internazionali\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63515\"}',1),
	(4,'1661','Zero Red+ Executive','Mobile','{\"descrizione\":\"Minuti e SMS illimitati in Italia e UE, minuti illimitati verso i numeri dell\'azienda e 4 Giga in 4G, 20 minuti e 20 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63526\"}',1),
	(5,'1745','Zero Red+ S','Mobile','{\"descrizione\":\"Minuti illimitati in Italia e UE, minuti illimitati verso i numeri dell\'azienda, 20 SMS e 1 Giga in 4G, 20 minuti e 20 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63527\"}',1),
	(6,'1744','Zero Red+ M','Mobile','{\"descrizione\":\"Minuti illimitati in Italia e UE, minuti illimitati verso i numeri dell\'azienda, 20 SMS e 5 Giga in 4G, 20 minuti e 20 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63533\"}',1),
	(7,'1746','Zero Red+ L','Mobile','{\"descrizione\":\"Minuti illimitati in Italia e UE, minuti illimitati verso i numeri dell\'azienda, 20 SMS e 10 Giga in 4G, 20 minuti e 20 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63535\"}',1),
	(8,'1748','Zero Red+ M Special','Mobile','{\"descrizione\":\"Minuti illimitati in Italia e UE, minuti illimitati verso i numeri dell\'azienda, 20 SMS e 5 Giga in 4G, 20 minuti e 20 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63536\"}',1),
	(9,'1623','Zero Ram Elite','Mobile','{\"descrizione\":\"Minuti e SMS illimitati in Italia, Europa, Usa e Canada, 10 Giga in 4G in Italia e UE e 5 Giga in Europa, USA e Canada\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63537\"}',1),
	(10,'1515','Open Maxi','Mobile','{\"descrizione\":\"800 minuti, 800 SMS verso tutti, minuti illimitati verso 3 numeri Vodafone preferiti e 1 Giga, 50 minuti e 50 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63956\"}',1),
	(11,'1673','Open Red+','Mobile','{\"descrizione\":\"Minuti e SMS illimitati, 2 Giga in 4G, 20 minuti e 20 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63963\"}',1),
	(12,'1651','Open Red+ Executive','Mobile','{\"descrizione\":\"Minuti e SMS illimitati, 4 Giga in 4G, 20 minuti e 20 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63965\"}',1),
	(13,'1635','Open Ram Elite','Mobile','{\"descrizione\":\"Minuti e SMS illimitati in Italia, Europa, USA e Canada, 10 Giga in 4G in Italie e UE, 5 Giga in Europa, USA e Canada e 50 SMS internazionali\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=63966\"}',1),
	(14,'1775','Zero Red Business XS','Mobile','{\"descrizione\":\"100 minuti, 100 SMS, minuti illimitati verso i numeri dell\'azienda, 100 Mega e 20 minuti e 20 SMS dall\'italia verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=64044\"}',1),
	(15,'1776','Zero Red Business S','Mobile','{\"descrizione\":\"Minuti illimitati in Italia e UE, 20 SMS e 2 Giga in 4G, 20 minuti e 20 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=64077\"}',1),
	(16,'1777','Zero Red Business M','Mobile','{\"descrizione\":\"Minuti illimitati in Italia e UE, 20 SMS e 10 Giga in 4G, 20 minuti e 20 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=64078\"}',1),
	(17,'1779','Zero Red Business L','Mobile','{\"descrizione\":\"Minuti illimitati in Italia e UE, 20 SMS e 30 Giga in 4G, 20 minuti e 20 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=64079\"}',1),
	(18,'1780','Zero Red Business XL','Mobile','{\"descrizione\":\"Minuti illimitati, 20 SMS e 30 Giga in 4G in Italia, Unione Europea, Svizzera, Principato di Monaco, Isole Faroe, Isola di Man e verso tutti i numeri dell\\u2019azienda fissi o mobili e minuti, SMS e 5 Giga da altri Paesi del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=64089\"}',1),
	(19,'1778','Zero Red Business M SPECIAL','Mobile','{\"descrizione\":\"Minuti illimitati in Italia e UE, minuti illimitati verso tutti i numeri dell\\u2019azienda fissi o mobili, 20 SMS e 10 Giga in 4G, 20 minuti e 20 SMS verso il resto del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=64090\"}',1),
	(20,'1781','Open Red Business XL','Mobile','{\"descrizione\":\"Minuti illimitati, 20 SMS e 30 Giga in 4G in Italia, Unione Europea, Svizzera, Principato di Monaco, Isole Faroe, Isola di Man e verso tutti i numeri dell\\u2019azienda fissi o mobili e minuti, SMS e 5 Giga da altri Paesi del mondo\",\"link\":\"https:\\/\\/www.vodafone.it\\/portal\\/client\\/cms\\/viewCmsPage.action?pageId=64097\"}',1);

/*!40000 ALTER TABLE `cataloghi_piani` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cataloghi_piani_dettagli
# ------------------------------------------------------------

LOCK TABLES `cataloghi_piani_dettagli` WRITE;
/*!40000 ALTER TABLE `cataloghi_piani_dettagli` DISABLE KEYS */;

INSERT INTO `cataloghi_piani_dettagli` (`id`, `piano_id`, `costo_pieno`, `frequenza`, `sconto`, `costo_scontato`, `validita_sconto`, `data_inizio`, `data_fine`)
VALUES
	(1,1,3.00,'al mese',NULL,3.00,'','2018-12-05',NULL),
	(2,1,1.00,'al mese',NULL,1.00,'','2018-12-05',NULL),
	(3,2,13.50,'al mese',NULL,13.50,'','2018-12-05',NULL),
	(4,2,13.50,'al mese','4',9.50,'per 24 mesi','2018-12-05',NULL),
	(5,3,16.50,'al mese',NULL,16.50,'','2018-12-05',NULL),
	(6,3,16.50,'al mese','3.5',13.00,'per 24 mesi','2018-12-05',NULL),
	(7,3,16.50,'al mese','5',11.50,'per 24 mesi','2018-12-05',NULL),
	(8,3,16.50,'al mese','7',9.50,'per 24 mesi','2018-12-05',NULL),
	(9,3,16.50,'al mese','10',6.50,'per 24 mesi','2018-12-05',NULL),
	(10,4,68.90,'al mese',NULL,68.90,'','2018-12-05',NULL),
	(11,4,68.90,'al mese','3.5',65.40,'per 24 mesi','2018-12-05',NULL),
	(12,4,68.90,'al mese','5.000000000000007',63.90,'per 24 mesi','2018-12-05',NULL),
	(13,4,68.90,'al mese','7.000000000000007',61.90,'per 24 mesi','2018-12-05',NULL),
	(14,4,68.90,'al mese','10.000000000000007',58.90,'per 24 mesi','2018-12-05',NULL),
	(15,4,68.90,'al mese','12.000000000000007',56.90,'per 24 mesi','2018-12-05',NULL),
	(16,4,68.90,'al mese','14.000000000000007',54.90,'per 24 mesi','2018-12-05',NULL),
	(17,4,68.90,'al mese','16.000000000000007',52.90,'per 24 mesi','2018-12-05',NULL),
	(18,4,68.90,'al mese','20.000000000000007',48.90,'per 24 mesi','2018-12-05',NULL),
	(19,5,28.00,'al mese',NULL,28.00,'','2018-12-05',NULL),
	(20,5,28.00,'al mese','3.5',24.50,'per 24 mesi','2018-12-05',NULL),
	(21,5,28.00,'al mese','5',23.00,'per 24 mesi','2018-12-05',NULL),
	(22,5,28.00,'al mese','7',21.00,'per 24 mesi','2018-12-05',NULL),
	(23,5,28.00,'al mese','10',18.00,'per 24 mesi','2018-12-05',NULL),
	(24,5,28.00,'al mese','12',16.00,'per 24 mesi','2018-12-05',NULL),
	(25,6,39.00,'al mese',NULL,39.00,'','2018-12-05',NULL),
	(26,6,39.00,'al mese','3.5',35.50,'per 24 mesi','2018-12-05',NULL),
	(27,6,39.00,'al mese','5',34.00,'per 24 mesi','2018-12-05',NULL),
	(28,6,39.00,'al mese','7',32.00,'per 24 mesi','2018-12-05',NULL),
	(29,6,39.00,'al mese','10',29.00,'per 24 mesi','2018-12-05',NULL),
	(30,6,39.00,'al mese','12',27.00,'per 24 mesi','2018-12-05',NULL),
	(31,6,39.00,'al mese','14',25.00,'per 24 mesi','2018-12-05',NULL),
	(32,6,39.00,'al mese','16',23.00,'per 24 mesi','2018-12-05',NULL),
	(33,6,39.00,'al mese','20',19.00,'per 24 mesi','2018-12-05',NULL),
	(34,7,49.00,'al mese',NULL,49.00,'','2018-12-05',NULL),
	(35,7,49.00,'al mese','3.5',45.50,'per 24 mesi','2018-12-05',NULL),
	(36,7,49.00,'al mese','5',44.00,'per 24 mesi','2018-12-05',NULL),
	(37,7,49.00,'al mese','7',42.00,'per 24 mesi','2018-12-05',NULL),
	(38,7,49.00,'al mese','10',39.00,'per 24 mesi','2018-12-05',NULL),
	(39,8,35.00,'al mese',NULL,35.00,'','2018-12-05',NULL),
	(40,8,35.00,'al mese','10',25.00,'','2018-12-05',NULL),
	(41,8,35.00,'al mese','15',20.00,'','2018-12-05',NULL),
	(42,9,89.00,'al mese',NULL,89.00,'','2018-12-05',NULL),
	(43,9,89.00,'al mese','5',84.00,'per 24 mesi','2018-12-05',NULL),
	(44,9,89.00,'al mese','7',82.00,'per 24 mesi','2018-12-05',NULL),
	(45,9,89.00,'al mese','10',79.00,'per 24 mesi','2018-12-05',NULL),
	(46,10,25.00,'al mese',NULL,25.00,'','2018-12-05',NULL),
	(47,10,25.00,'al mese','4',21.00,'per 24 mesi','2018-12-05',NULL),
	(48,11,45.00,'al mese',NULL,45.00,'','2018-12-05',NULL),
	(49,11,45.00,'al mese','3.5',41.50,'per 24 mesi','2018-12-05',NULL),
	(50,11,45.00,'al mese','5',40.00,'per 24 mesi','2018-12-05',NULL),
	(51,11,45.00,'al mese','7',38.00,'per 24 mesi','2018-12-05',NULL),
	(52,11,45.00,'al mese','10',35.00,'per 24 mesi','2018-12-05',NULL),
	(53,11,45.00,'al mese','12',33.00,'per 24 mesi','2018-12-05',NULL),
	(54,11,45.00,'al mese','14',31.00,'per 24 mesi','2018-12-05',NULL),
	(55,12,65.00,'al mese',NULL,65.00,'','2018-12-05',NULL),
	(56,12,65.00,'al mese','3.5',61.50,'per 24 mesi','2018-12-05',NULL),
	(57,12,65.00,'al mese','5',60.00,'per 24 mesi','2018-12-05',NULL),
	(58,12,65.00,'al mese','7',58.00,'per 24 mesi','2018-12-05',NULL),
	(59,12,65.00,'al mese','10',55.00,'per 24 mesi','2018-12-05',NULL),
	(60,12,65.00,'al mese','12',53.00,'per 24 mesi','2018-12-05',NULL),
	(61,12,65.00,'al mese','14',51.00,'per 24 mesi','2018-12-05',NULL),
	(62,13,86.00,'al mese',NULL,86.00,'','2018-12-05',NULL),
	(63,14,10.00,'al mese',NULL,10.00,'','2018-12-05',NULL),
	(64,14,10.00,'al mese','3.5',6.50,'per 24 mesi','2018-12-05',NULL),
	(65,14,10.00,'al mese','5',5.00,'per 24 mesi','2018-12-05',NULL),
	(66,14,10.00,'al mese','7',3.00,'per 24 mesi','2018-12-05',NULL),
	(67,15,25.00,'al mese',NULL,25.00,'','2018-12-05',NULL),
	(68,15,25.00,'al mese','3.5',21.50,'per 24 mesi','2018-12-05',NULL),
	(69,15,25.00,'al mese','5',20.00,'per 24 mesi','2018-12-05',NULL),
	(70,15,25.00,'al mese','7',18.00,'per 24 mesi','2018-12-05',NULL),
	(71,15,25.00,'al mese','10',15.00,'per 24 mesi','2018-12-05',NULL),
	(72,15,25.00,'al mese','12',13.00,'per 24 mesi','2018-12-05',NULL),
	(73,15,25.00,'al mese','14',11.00,'per 24 mesi','2018-12-05',NULL),
	(74,15,25.00,'al mese','16',9.00,'per 24 mesi','2018-12-05',NULL),
	(75,16,35.00,'al mese',NULL,35.00,'','2018-12-05',NULL),
	(76,16,35.00,'al mese','3.5',31.50,'per 24 mesi','2018-12-05',NULL),
	(77,16,35.00,'al mese','5',30.00,'per 24 mesi','2018-12-05',NULL),
	(78,16,35.00,'al mese','7',28.00,'per 24 mesi','2018-12-05',NULL),
	(79,16,35.00,'al mese','10',25.00,'per 24 mesi','2018-12-05',NULL),
	(80,16,35.00,'al mese','12',23.00,'per 24 mesi','2018-12-05',NULL),
	(81,16,35.00,'al mese','14',21.00,'per 24 mesi','2018-12-05',NULL),
	(82,16,35.00,'al mese','16',19.00,'per 24 mesi','2018-12-05',NULL),
	(83,16,35.00,'al mese','20',15.00,'per 24 mesi','2018-12-05',NULL),
	(84,16,35.00,'al mese','22',13.00,'per 24 mesi','2018-12-05',NULL),
	(85,17,45.00,'al mese',NULL,45.00,'','2018-12-05',NULL),
	(86,17,45.00,'al mese','3.5',41.50,'','2018-12-05',NULL),
	(87,17,45.00,'al mese','5',40.00,'','2018-12-05',NULL),
	(88,17,45.00,'al mese','7',38.00,'','2018-12-05',NULL),
	(89,17,45.00,'al mese','10',35.00,'','2018-12-05',NULL),
	(90,17,45.00,'al mese','12',33.00,'','2018-12-05',NULL),
	(91,17,45.00,'al mese','14',31.00,'','2018-12-05',NULL),
	(92,17,45.00,'al mese','16',29.00,'','2018-12-05',NULL),
	(93,17,45.00,'al mese','20',25.00,'','2018-12-05',NULL),
	(94,17,45.00,'al mese','22',23.00,'','2018-12-05',NULL),
	(95,18,60.00,'al mese',NULL,60.00,'','2018-12-05',NULL),
	(96,18,60.00,'al mese','3.5',56.50,'','2018-12-05',NULL),
	(97,18,60.00,'al mese','5',55.00,'','2018-12-05',NULL),
	(98,18,60.00,'al mese','7',53.00,'','2018-12-05',NULL),
	(99,18,60.00,'al mese','10',50.00,'','2018-12-05',NULL),
	(100,18,60.00,'al mese','12',48.00,'','2018-12-05',NULL),
	(101,18,60.00,'al mese','14',46.00,'','2018-12-05',NULL),
	(102,18,60.00,'al mese','16',44.00,'','2018-12-05',NULL),
	(103,18,60.00,'al mese','20',40.00,'','2018-12-05',NULL),
	(104,18,60.00,'al mese','22',38.00,'','2018-12-05',NULL),
	(105,19,35.00,'al mese',NULL,35.00,'','2018-12-05',NULL),
	(106,20,60.00,'al mese',NULL,60.00,'','2018-12-05',NULL),
	(107,20,60.00,'al mese','3.5',56.50,'','2018-12-06',NULL),
	(108,20,60.00,'al mese','5',55.00,'','2018-12-07',NULL),
	(109,20,60.00,'al mese','7',53.00,'','2018-12-08',NULL),
	(110,20,60.00,'al mese','10',50.00,'','2018-12-09',NULL),
	(111,20,60.00,'al mese','12',48.00,'','2018-12-10',NULL),
	(112,20,60.00,'al mese','14',46.00,'','2018-12-11',NULL),
	(113,20,60.00,'al mese','16',44.00,'','2018-12-12',NULL),
	(114,20,60.00,'al mese','20',40.00,'','2018-12-13',NULL),
	(115,20,60.00,'al mese','22',38.00,'','2018-12-14',NULL);

/*!40000 ALTER TABLE `cataloghi_piani_dettagli` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
