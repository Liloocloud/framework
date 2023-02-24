<?php
$MySQL = "
CREATE TABLE IF NOT EXISTS `liloo_accounts` (
    `account_id` bigint(20) NOT NULL AUTO_INCREMENT,
    `account_this_id` bigint(20) DEFAULT NULL,
    `account_level` int(11) NOT NULL,
    `account_name` varchar(255) DEFAULT NULL,
    `account_lastname` varchar(50) DEFAULT NULL,
    `account_email` varchar(100) NOT NULL,
    `account_phone` varchar(20) NOT NULL,
    `account_password` char(60) DEFAULT NULL,
    `account_adds` longtext,
    `account_coin` int(11) DEFAULT NULL,
    `account_url` varchar(100) DEFAULT NULL,
    `account_activation_key` varchar(255) DEFAULT NULL,
    `account_creci` varchar(255) DEFAULT NULL,
    `account_cpf` varchar(15) DEFAULT NULL,
    `account_cnpj` varchar(20) DEFAULT NULL,
    `account_auth` int(1) DEFAULT '0' COMMENT 'Se o usuário validou a conta 1, se não validou 0',
    `account_status` int(1) DEFAULT '0' COMMENT 'Mesmo estando validado, verifica se o usuário está ativo ou inativo',
    `account_accept_terms` int(1) DEFAULT '0' COMMENT 'Garante que o usuário tenha aceito os termos de uso',
    `account_token` char(40) DEFAULT NULL,
    `account_last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `account_registered` datetime DEFAULT CURRENT_TIMESTAMP,
    `account_modify` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`account_id`),
    UNIQUE KEY `unique` (`account_email`,`account_url`,`account_phone`,`account_creci`,`account_cpf`,`account_cnpj`) USING BTREE,
    KEY `fk` (`account_this_id`) USING BTREE,
    FULLTEXT KEY `fulltext` (`account_name`,`account_lastname`),
    CONSTRAINT `fk` FOREIGN KEY (`account_this_id`) REFERENCES `liloo_accounts` (`account_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `liloo_accounts` (`account_id`, `account_this_id`, `account_level`, `account_name`, `account_lastname`, `account_email`, `account_phone`, `account_password`, `account_adds`, `account_coin`, `account_url`, `account_activation_key`, `account_creci`, `account_cpf`, `account_cnpj`, `account_auth`, `account_status`, `account_accept_terms`, `account_token`, `account_last_login`, `account_registered`, `account_modify`) VALUES
	(1, NULL, 10, 'Felipe', 'Oliveira', 'felipe.game.studio@gmail.com', '(13) 98175-0225', '$2a$08$M1bL6VE0ZYKCi8I47XqgRONNf07GKu1huSIOHH/SP0E57kjw3fpSG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 1, 'd0ebf5ebd134789f0dd60395c00920c1320b913a', '2022-01-05 15:31:46', '2021-11-25 08:56:59', '2022-01-05 19:13:31');

";