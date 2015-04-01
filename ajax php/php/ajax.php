<?php
/* Määritetään käytettävä tietokanta:
Huom! tässä kohdassa täytyy vaihtaa omaa localhost asetusta vastaavat tiedot*/
$dbOptions = array(
	'db_host' => 'localhost',
	'db_user' => 'root',
	'db_pass' => '',
	'db_name' => 'tables'
);

/* Lisätään luokat: */
error_reporting(E_ALL ^ E_NOTICE);
require "classes/DB.class.php";
require "classes/Chat.class.php";
require "classes/ChatBase.class.php";
require "classes/ChatLine.class.php";
require "classes/ChatUser.class.php";

session_name('webchat');
session_start();

if(get_magic_quotes_gpc()){
	array_walk_recursive($_GET,create_function('&$v,$k','$v = stripslashes($v);'));
	array_walk_recursive($_POST,create_function('&$v,$k','$v = stripslashes($v);'));
}

try{
	// Yhdistetään
	DB::init($dbOptions);
	$response = array();
	
	// Määritetään tapahtumat switch caseilla:
	switch($_GET['action']){
		//sisäänkirjautuminen
		case 'login':
			$response = Chat::login($_POST['name'],$_POST['email']);
		break;
		//ketkä paikalla
		case 'checkLogged':
			$response = Chat::checkLogged();
		break;
		//uloskirjautuminen
		case 'logout':
			$response = Chat::logout();
		break;
		//viestin lähetys
		case 'submitChat':
			$response = Chat::submitChat($_POST['chatText']);
		break;
		//hae käyttäjät
		case 'getUsers':
			$response = Chat::getUsers();
		break;
		//hae viestit
		case 'getChats':
			$response = Chat::getChats($_GET['lastID']);
		break;
		//Luo ryhmä
		case 'createGroup':
			$response = Chat::createGroup($_POST['groupName']);
		break;
		
		default:
			throw new Exception('Wrong action');
	}
	echo json_encode($response);
}
catch(Exception $e){
	die(json_encode(array('error' => $e->getMessage())));
}

?>