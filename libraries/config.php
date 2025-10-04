<?php
if (!defined('LIBRARIES')) die("Error");

/* Root */
define('ROOT', __DIR__);

/* Timezone */
date_default_timezone_set('Asia/Ho_Chi_Minh');

/* Cấu hình coder */
define('VNS_MSHD', 'MSHD');

/* Cấu hình chung */
$config = array(
	'author' => array(
		'name' => '',
		'email' => '',
		'timefinish' => '12/2024'
	),
	'arrayDomainSSL' => array("noithath2c.vn"),
	'database' => array(
		'server-name' => $_SERVER["SERVER_NAME"],
		'url' => '/noithath2c.vn/',
		'type' => 'mysql',
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'dbname' => 'noithath2c',
		'port' => 3306,
		'prefix' => 'table_',
		'charset' => 'utf8'
	),
	'website' => array(
		'error-reporting' => false,
		'secret' => '$vina@',
		'salt' => 'Z`jcgBj!x8',
		'default_pass' => '808596c9',
		'default_md5' => 'b1a539581f7a0c0b651fd73b0f60cc14',
		'debug-developer' => true,
		'debug-developer-mailhost' => true,
		'debug-css' => true,
		'debug-js' => true,
		'index' => false,
		'upload' => array(
			'max-width' => 1920,
			'max-height' => 1600
		),
		'lang' => array(
			'vi' => 'Tiếng Việt',
			//'en'=>'Tiếng Anh'
		),
		'lang-doc' => 'vi|en',
		'slug' => array(
			'vi' => 'Tiếng Việt',
			//'en'=>'Tiếng Anh'
		),
		'seo' => array(
			'vi' => 'Tiếng Việt',
			//'en'=>'Tiếng Anh'
		),
		'comlang' => array(
			"gioi-thieu" => array("vi" => "gioi-thieu"),
			"san-pham" => array("vi" => "san-pham"),
			"tin-tuc" => array("vi" => "tin-tuc"),
			"thu-vien-anh" => array("vi" => "thu-vien-anh"),
			"video" => array("vi" => "video"),
			"lien-he" => array("vi" => "lien-he")
		)
	),
	'googleAPI' => array(
		'recaptcha' => array(
			'active' => true,
			'urlapi' => 'https://www.google.com/recaptcha/api/siteverify',
			'sitekey' => '6LfsuZQqAAAAAKAROvmwzQ79NXKoljlRAw91CK8W',
			'secretkey' => '6LfsuZQqAAAAADRtXFN0u2d8MIiZLZmrvsEmGho0'
		)
	),
	'cart' => array(
		'active' => false,
	),
	'order' => array(
		'ship' => false,
	),
	'oneSignal' => array(
		'active' => false,
		'id' => 'af12ae0e-cfb7-41d0-91d8-8997fca889f8',
		'restId' => 'MWFmZGVhMzYtY2U0Zi00MjA0LTg0ODEtZWFkZTZlNmM1MDg4'
	),
	'login' => array(
		'admin' => 'LoginAdmin' . VNS_MSHD,
		'member' => 'LoginMember' . VNS_MSHD,
		'attempt' => 5,
		'delay' => 15
	),
	'license' => array(
		'version' => "7.0.0",
		'powered' => ""
	)
);

/* Error reporting */
error_reporting(($config['website']['error-reporting']) ? E_ALL : 0);

/* Cấu hình base */
$http = 'http';
if (array_key_exists('HTTPS', $_SERVER) && $_SERVER["HTTPS"] == "on") $http .= "s";
$http .= "://";

$config_url = $config['database']['server-name'] . $config['database']['url'];
$config_base = $http . $config_url;

/* Cấu hình login */
$login_admin = $config['login']['admin'];
$login_member = $config['login']['member'];

/* Cấu hình upload */
require_once LIBRARIES . "constant.php";
