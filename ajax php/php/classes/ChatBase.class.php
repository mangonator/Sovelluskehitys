<?php
/* Class jolla pohjustetaan ChatLine ja ChatUser */
class ChatBase{

	// Alaluokissa käytettävä constructori:
	public function __construct(array $options){
		
		foreach($options as $k=>$v){
			if(isset($this->$k)){
				$this->$k = $v;
			}
		}
	}
}
?>