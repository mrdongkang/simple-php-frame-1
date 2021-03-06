<?php
/**
*入口文件
*1.定义常量
*2.加载函数库
*3.启动框架
*/
//define('IMOOC',dirname(__FILE__));
define('IMOOC',str_replace('\\','/',dirname(realpath(__FILE__))));
define('CORE',IMOOC.'/core');
define('APP',IMOOC.'/app');
define('MODULE','app');
define('DEBUG',true);

if(DEBUG){
	ini_set('display_errors','On');
}else{
	ini_set('display_errors','Off');
}

include CORE.'/common/function.php';
include CORE.'/imooc.php';

spl_autoload_register('\core\imooc::load');

\core\imooc::run();
