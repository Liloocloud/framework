CREATE TABLE IF NOT EXISTS `liloo_order_items` (
  `order_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_order_id` bigint(20) DEFAULT NULL COMMENT 'ID do pedido. Será gravado em todos os items desse pedido',
  `order_item_id` bigint(20) DEFAULT NULL COMMENT 'ID do item',
  `order_item_amount` int(11) DEFAULT NULL COMMENT 'Quantidade / Estoque',
  `order_item_price` float(10,2) DEFAULT NULL COMMENT 'Preço do produto no momendo do pedido (Para evitar erro de preço)',
  `order_sum_price` float(10,2) DEFAULT NULL COMMENT 'Preço do total qtd + preço somado',
  `order_registered` datetime DEFAULT CURRENT_TIMESTAMP,
  `order_modify` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `FK_liloo_order_items_liloo_orders` (`order_order_id`),
  CONSTRAINT `FK_liloo_order_items_liloo_orders` FOREIGN KEY (`order_order_id`) REFERENCES `liloo_orders` (`order_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;