<?php

namespace database;

class Mysql {

	public function ddb(){
		return array(

				// devine server
				'server' 	=> 'localhost',
				// devine database username 
				'user'	 	=> 'root',
				// devine mysql password
				'pass'	 	=> '',
				// devine database
				'database'	=> 'phonebook'
				// 'database'	=> 'addressbook'

			);
	}

}