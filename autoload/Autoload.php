<?php
/* Load config */

$loadHelper = [
	'Function',
	'Input',
	'DB',
	'Pagination',
	'Redirect',
	'Session',
	'Validator',
	'Auth'
];

$posUrl =  strpos("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", 'admin');

if ($posUrl != null) {
	require_once('../../config/Config.php');
	require_once('../../vendor/autoload.php');

	foreach ($loadHelper as $item) {
		require_once("../../helper/$item.php");
	}
} else {
	require_once('./config/Config.php');
	foreach ($loadHelper as $item) {
		require_once("./helper/$item.php");
	}
}

$DB = new DB();
