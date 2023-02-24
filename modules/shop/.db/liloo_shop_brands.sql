-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.31 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela liloo.busqueja.liloo_shop_brands
CREATE TABLE IF NOT EXISTS `liloo_shop_brands` (
  `brand_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `brand_account_id` bigint(20) DEFAULT NULL,
  `brand_name` varchar(150) DEFAULT NULL COMMENT 'Nome da marca ou fabricante',
  `brand_description` varchar(500) DEFAULT NULL COMMENT 'Descrição da marca',
  `brand_type` varchar(20) DEFAULT NULL COMMENT 'Tipo da marca. Como se fosse um setor',
  `brand_category` varchar(50) DEFAULT NULL COMMENT 'Categoria da marca',
  `brand_images` longtext COMMENT 'Caminhos das imagens em JSON ou separados por vírgula',
  `brand_cover` longtext COMMENT 'Caminho da imagem de capa',
  `brand_active` int(1) DEFAULT '1' COMMENT 'Se o marca está ativa ou não',
  `brand_registered` datetime DEFAULT CURRENT_TIMESTAMP,
  `brand_modify` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`brand_id`) USING BTREE,
  UNIQUE KEY `UNIQUE` (`brand_name`),
  KEY `FK_liloo_shop_brands_liloo_accounts` (`brand_account_id`),
  FULLTEXT KEY `FULL TEXT` (`brand_name`,`brand_description`),
  CONSTRAINT `FK_liloo_shop_brands_liloo_accounts` FOREIGN KEY (`brand_account_id`) REFERENCES `liloo_accounts` (`account_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela liloo.busqueja.liloo_shop_brands: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `liloo_shop_brands` DISABLE KEYS */;
/*!40000 ALTER TABLE `liloo_shop_brands` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
