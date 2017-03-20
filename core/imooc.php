<?php
namespace core;

class imooc{

	//建立储存已经加载的类的静态变量
	static public $classMap = array();
	public $assign;

	static public function run(){
		//加载路由类
		$route = new \core\lib\route();
		$ctrlClass = $route->ctrl;
		$action = $route->action;
		$ctrlfile = APP."/ctrl/".$ctrlClass."Ctrl.php";

		$ctrlClass = "\\".MODULE."\ctrl\\".$ctrlClass."Ctrl";

		if(is_file($ctrlfile)){
			include $ctrlfile;
			$ctrl = new $ctrlClass();
			$ctrl->$action();
		}else{
			throw new \Exception("找不到控制器！！！".$ctrlClass);
		}
	}

	//自动加载类库
	static public function load($class){
		//自动加载类库
		//new \core\route();
		//$class='\core\route'
		//IMOOC.'/core/route.php';
		if(isset($classMap[$class])){
			return true;
		}else{
			$class =  str_replace("\\","/",$class);
			$file = IMOOC.'/'.$class.".php";
			if (is_file($file)) {
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}



	public function assign($name,$value){
		$this->assign[$name] = $value;
	}

	public function display($file){
		$filename = APP."/views/".$file;

		if(is_file($filename)){
			extract($this->assign);
			include $filename;
		}
	}
	
}
