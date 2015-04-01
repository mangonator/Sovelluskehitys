<?php
/* Chatline-luokalla lisätään uudet viestit.
   Author=viestin lisääjä, gravatar=käyttäjän kuva, text=viesti */
class ChatLine extends ChatBase{
	
	protected $text = '', $author = '', $gravatar = '', $group = '';
	
	public function save(){
		//sql kysely:
		DB::query("
			INSERT INTO 'group' (author, gravatar, text)
			VALUES (
				'".DB::esc($this->author)."',
				'".DB::esc($this->gravatar)."',
				'".DB::esc($this->text)."'
		)");
		
		// Palauttaa DB luokan MySQLi objectin
		return DB::getMySQLiObject();
	}
}
?>