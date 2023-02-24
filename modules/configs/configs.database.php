<?php
$MySQL = "
CREATE TABLE IF NOT EXISTS `liloo_clients` (
    `client_id` bigint(20) NOT NULL AUTO_INCREMENT,
    `client_account_id` bigint(20) DEFAULT NULL COMMENT 'ID da conta pertencente',
    `client_code` varchar(50) NOT NULL COMMENT 'Código do Cliente',
    `client_name` varchar(100) NOT NULL COMMENT 'Nome do Cliente',
    `client_email` varchar(150) NOT NULL COMMENT 'E-mail do Cliente',
    `client_phone_1` varchar(50) DEFAULT NULL,
    `client_phone_2` varchar(50) DEFAULT NULL,
    `client_whatsapp` varchar(50) DEFAULT NULL,
    `client_document` varchar(50) DEFAULT NULL COMMENT 'CNPJ ou CPF do Cliente',
    `client_zipcode` varchar(20) DEFAULT NULL COMMENT 'CEP',
    `client_address` varchar(150) DEFAULT NULL COMMENT 'Endereço',
    `client_city` varchar(150) DEFAULT NULL COMMENT 'Cidade',
    `client_number` varchar(20) DEFAULT NULL COMMENT 'Numero do endereço',
    `client_complement` varchar(20) DEFAULT NULL COMMENT 'Complemento caso necessário',
    `client_state` varchar(20) DEFAULT NULL COMMENT 'Estado',
    `client_description` longtext COMMENT 'Breve descrição do cliente',
    `client_registered` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Data de registro do cliente',
    `client_modify` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Data de modificação do cliente',
    PRIMARY KEY (`client_id`),
    UNIQUE KEY `UNIQUE` (`client_code`,`client_email`,`client_document`) USING BTREE,
    KEY `FK_liloo_clients_liloo_accounts` (`client_account_id`),
    FULLTEXT KEY `FULL TEXT` (`client_name`,`client_description`),
    CONSTRAINT `FK_liloo_clients_liloo_accounts` FOREIGN KEY (`client_account_id`) REFERENCES `liloo_accounts` (`account_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de clientes do sistema de pedido';
";