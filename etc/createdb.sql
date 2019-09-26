CREATE DATABASE IF NOT EXISTS `default_test` COLLATE 'utf8_general_ci' ;
GRANT ALL ON `default_test`.* TO 'default'@'%' ;

FLUSH PRIVILEGES ;