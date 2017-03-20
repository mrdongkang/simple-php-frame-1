<?php
namespace app\ctrl;

class indexCtrl extends \core\imooc
{
	
	public function index(){
		/*
		*数据库的使用
		*模型层的使用
		*/
		//$model = new \core\lib\model();
		// $sql = "select * from user;";
		// $result = $model->query($sql);
		// p($result->fetchAll());
		$name = "hello world";
		$title = "视图文件";
		$this->assign("name",$name);
		$this->assign("title",$title);
		$this->display("index.html");
	}

	public function show(){
		echo "this is inde show!!!";
	}
}