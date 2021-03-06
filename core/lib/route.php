<?php

namespace core\lib;
use core\lib\conf;

class route{

	//新建俩个变量存储变量和方法
	public $ctrl;
	public $action;
	public function __construct(){
		//xx.com/index/index
		/*
		**
		*1.隐藏我们得index.php
		*2.获取URL的参数部分
		*3.返回我们得控制器和方法
		*/
		//俩种取法
		// p($_SERVER);
		// exit;
		//$url = $_SERVER['PATH_INFO'];
		//$url = $_SERVER['REQUEST_URI'];
		//p($_SERVER);
		//exit;
		if(isset($_SERVER['PATH_INFO'])){
			// /index/index
			$path = $_SERVER['PATH_INFO'];
			$patharr = explode("/",trim($path,'/'));

			if(isset($patharr[0])){
				$this->ctrl = $patharr[0];
			}
			unset($patharr[0]);
			if(isset($patharr[1])){
				$this->action = $patharr[1];
				unset($patharr[1]);
			}else{
				$this->action = conf::get('ACTION','route');
			}
			//url多余部分转化成get参数
			$count = count($patharr) + 2;
			$i = 2;
			while($i < $count){
				if(isset($patharr[$i+1])){
					$_GET[$patharr[$i]] = $patharr[$i+1];
				}
				$i=$i+2;
			}
		}else{
			$this->ctrl = conf::get('CTRL','route');
			$this->action = conf::get('ACTION','route');
		}
	}
}
