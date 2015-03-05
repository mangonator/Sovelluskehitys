<?php
/* Laajentaa ajax.php:n toimintoja:*/
class Chat{
	
	//Sisäänkirjautuminen: lisätään käyttäjä sisäänkirjautuneiden listaan
	public static function login($name,$email){
		if(!$name || !$email){
			throw new Exception('Täytä kaikki tarvittavat kentät.');
		}
		
		if(!filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)){
			throw new Exception('Viallinen sähköposti.');
		}
		
		// Käytetään käyttäjien kuvina gravatareja::
		$gravatar = md5(strtolower(trim($email)));
		
		$user = new ChatUser(array(
			'name'		=> $name,
			'gravatar'	=> $gravatar
		));
		
		// The save method returns a MySQLi object
		if($user->save()->affected_rows != 1){
			throw new Exception('Tämä nimimerkki on jo käytössä.');
		}
		
		$_SESSION['user']	= array(
			'name'		=> $name,
			'gravatar'	=> $gravatar
		);
		
		return array(
			'status'	=> 1,
			'name'		=> $name,
			'gravatar'	=> Chat::gravatarFromHash($gravatar)
		);
	}
	
	//tarkistetaan kirjautuneet
	public static function checkLogged(){
		$response = array('logged' => false);
			
		if($_SESSION['user']['name']){
			$response['logged'] = true;
			$response['loggedAs'] = array(
				'name'		=> $_SESSION['user']['name'],
				'gravatar'	=> Chat::gravatarFromHash($_SESSION['user']['gravatar'])
			);
		}
		
		return $response;
	}
	
	//Uloskirjautuminen: poistetaan käyttäjä sisäänkirjautuneiden listasta
	public static function logout(){
		DB::query("DELETE FROM webchat_users WHERE name = '".DB::esc($_SESSION['user']['name'])."'");
		
		$_SESSION = array();
		unset($_SESSION);

		return array('status' => 1);
	}
	
	//Viestin lähetys:
	public static function submitChat($chatText){
		//Tarkistetaan, että käyttäjä on kirjautunut sisään
		if(!$_SESSION['user']){
			throw new Exception('Et ole kirjautuneena sisään');
		}
		
		//tyhjän inputin tarkistus
		if(!$chatText){
			throw new Exception('Et ole kirjoittanut mitään');
		}
		
		//Lisätään uusi rivi chattiin
		$chat = new ChatLine(array(
			'author'	=> $_SESSION['user']['name'],
			'gravatar'	=> $_SESSION['user']['gravatar'],
			'text'		=> $chatText
		));
	
		// Tallennus palauttaa MySQLi objectin
		$insertID = $chat->save()->insert_id;
	
		return array(
			'status'	=> 1,
			'insertID'	=> $insertID
		);
	}
	
	//haetaan käyttäjät
	public static function getUsers(){
		if($_SESSION['user']['name']){
			$user = new ChatUser(array('name' => $_SESSION['user']['name']));
			$user->update();
		}
		
		// Poistetaan 5 minuuttia vanhemmat viestit ja inaktiiviset käyttäjät
		
		DB::query("DELETE FROM webchat_lines WHERE ts < SUBTIME(NOW(),'0:5:0')");
		DB::query("DELETE FROM webchat_users WHERE last_activity < SUBTIME(NOW(),'0:0:30')");
		
		$result = DB::query('SELECT * FROM webchat_users ORDER BY name ASC LIMIT 18');
		
		$users = array();
		while($user = $result->fetch_object()){
			$user->gravatar = Chat::gravatarFromHash($user->gravatar,30);
			$users[] = $user;
		}
	
		return array(
			'users' => $users,
			'total' => DB::query('SELECT COUNT(*) as cnt FROM webchat_users')->fetch_object()->cnt
		);
	}
	
	public static function getChats($lastID){
		$lastID = (int)$lastID;
	
		$result = DB::query('SELECT * FROM webchat_lines WHERE id > '.$lastID.' ORDER BY id ASC');
	
		$chats = array();
		while($chat = $result->fetch_object()){
			
			// Returning the GMT (UTC) time of the chat creation:
			
			$chat->time = array(
				'hours'		=> gmdate('H',strtotime($chat->ts)),
				'minutes'	=> gmdate('i',strtotime($chat->ts))
			);
			
			$chat->gravatar = Chat::gravatarFromHash($chat->gravatar);
			
			$chats[] = $chat;
		}
	
		return array('chats' => $chats);
	}
	
	//gravatar hashit
	public static function gravatarFromHash($hash, $size=23){
		return 'http://www.gravatar.com/avatar/'.$hash.'?size='.$size.'&amp;default='.
				urlencode('http://www.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?size='.$size);
	}
}
?>