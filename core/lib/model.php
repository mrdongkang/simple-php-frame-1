<?php

namespace core\lib;
use core\lib\conf;
class model extends \PDO
{
	public function __construct(){
		$db = conf::all('database');
		try{
			parent::__construct($db['DSN'],$db['USERNAME'],$db['PASSWD']);
		}catch(\PDOException $e){
			p($e->getMessage());
		}
	}
}