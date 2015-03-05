<?php
/* Päivittää käyttäjien listaa: */
class ChatUser extends ChatBase{
	
	protected $name = '', $gravatar = '';
	
	public function save(){
		//lisätään käyttäjä webchat_users taulukkoon
		DB::query("
			INSERT INTO webchat_users (name, gravatar)
			VALUES (
				'".DB::esc($this->name)."',
				'".DB::esc($this->gravatar)."'
		)");
		
		return DB::getMySQLiObject();
	}
	//päivtys:
	public function update(){
		DB::query("
			INSERT INTO webchat_users (name, gravatar)
			VALUES (
				'".DB::esc($this->name)."',
				'".DB::esc($this->gravatar)."'
			) ON DUPLICATE KEY UPDATE last_activity = NOW()");
	}
}
?>