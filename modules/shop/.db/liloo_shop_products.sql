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

-- Copiando estrutura para tabela liloo.busqueja.liloo_shop_products
CREATE TABLE IF NOT EXISTS `liloo_shop_products` (
  `prod_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `prod_account_id` bigint(20) DEFAULT NULL,
  `prod_code` varchar(10) DEFAULT NULL COMMENT 'Código do Produto',
  `prod_brand` varchar(50) DEFAULT NULL COMMENT 'Fabricante ou marca',
  `prod_title` varchar(150) DEFAULT NULL COMMENT 'Título do produto',
  `prod_description` varchar(500) DEFAULT NULL COMMENT 'Descrição do produto',
  `prod_datasheet` longtext COMMENT 'Ficha técnica do produto',
  `prod_package` varchar(100) DEFAULT NULL COMMENT 'Caso tenha unidades dentro do Produto',
  `prod_size` varchar(100) DEFAULT NULL COMMENT 'Tamanho CxLxA (Caso tenha)',
  `prod_weight` varchar(100) DEFAULT NULL COMMENT 'Peso do Produto (Caso tenha)',
  `prod_type` varchar(20) DEFAULT NULL COMMENT 'Tipo',
  `prod_category` varchar(50) DEFAULT NULL COMMENT 'Categoria do produto',
  `prod_price` float(10,2) DEFAULT NULL COMMENT 'Preço',
  `prod_price_promotional` float(10,2) DEFAULT NULL COMMENT 'Preço promotional caso tenha',
  `prod_price_show` int(1) DEFAULT '1' COMMENT '1 para mostrar preço e 0 para esconder preço',
  `prod_amount` int(11) DEFAULT NULL COMMENT 'Quantidade em Estoque',
  `prod_images` longtext COMMENT 'Caminhos das imagens em JSON ou separados por vírgula',
  `prod_cover` longtext COMMENT 'Caminho da imagem de capa',
  `prod_active` int(1) DEFAULT '1' COMMENT 'Se o produto está ativo no site ou não',
  `prod_registered` datetime DEFAULT CURRENT_TIMESTAMP,
  `prod_modify` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`prod_id`) USING BTREE,
  UNIQUE KEY `prod_code` (`prod_code`),
  KEY `FK_liloo_prods_liloo_accounts` (`prod_account_id`),
  FULLTEXT KEY `FULL TEXT` (`prod_title`,`prod_description`,`prod_datasheet`),
  CONSTRAINT `FK_liloo_prods_liloo_accounts` FOREIGN KEY (`prod_account_id`) REFERENCES `liloo_accounts` (`account_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela liloo.busqueja.liloo_shop_products: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `liloo_shop_products` DISABLE KEYS */;
INSERT INTO `liloo_shop_products` (`prod_id`, `prod_account_id`, `prod_code`, `prod_brand`, `prod_title`, `prod_description`, `prod_datasheet`, `prod_package`, `prod_size`, `prod_weight`, `prod_type`, `prod_category`, `prod_price`, `prod_price_promotional`, `prod_price_show`, `prod_amount`, `prod_images`, `prod_cover`, `prod_active`, `prod_registered`, `prod_modify`) VALUES
	(1, 16, '001', 'Ferrari', 'Ferrari 920 GT', 'Linda Ferrari', NULL, NULL, NULL, NULL, NULL, NULL, 200000.00, NULL, 1, 5, NULL, NULL, 1, '2022-09-21 19:01:56', '2022-09-22 12:29:12'),
	(2, 16, '002', 'Ferrari', 'Ferrari Vermelha GT', 'Linda Ferrari', NULL, NULL, NULL, NULL, NULL, NULL, 250.50, NULL, 1, 25, NULL, NULL, 1, '2022-09-21 19:01:56', '2022-09-23 11:40:42');
/*!40000 ALTER TABLE `liloo_shop_products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
