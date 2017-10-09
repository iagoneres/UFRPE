<?php

/** O nome do banco de dados*/
define('DB_NAME', 'u308024276_fes');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'u308024276_iago');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'InBn$19$');

/** nome do host do MySQL */
define('DB_HOST', 'mysql.hostinger.com.br');

/** caminho absoluto para a pasta do sistema **/
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** caminho no server para o sistema **/
if ( !defined('BASEURL') )
	define('BASEURL', 'http://rocketfinance.pe.hu/');

/** caminho do arquivo de banco de dados **/
if ( !defined('DBAPI') )
	define('DBAPI', ABSPATH . 'inc/database.php');

/** caminhos dos templates default **/
define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php');
define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php');
define('SIDEBAR_TEMPLATE', ABSPATH . 'inc/sidebar.php');

/** caminho das views **/
define('DASHBOARD', BASEURL . 'views/painel_de_controle.php');
define('PROFILE', BASEURL . 'views/perfil.php');
define('OCCURRENCES', BASEURL . 'views/ocorrencias.php');
define('SIMULATIONS', BASEURL . 'views/simulacoes.php');
define('NOTIFICATIONS', BASEURL . 'views/notificacoes.php');
define('LOGIN', BASEURL . 'views/login.php');
define('LOGOUT', BASEURL . 'inc/logout.php');
