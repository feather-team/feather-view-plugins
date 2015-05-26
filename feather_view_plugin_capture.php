<?php
/*
capture插件，用于捕获一段执行后的模板代码，可在任意地方进行insert，将其内容插入目标位置。

#layout.html
<html>
<?php $this->plugin('capture')->title->insert();?>
</html>

#index.html
<?php $this->plugin('capture')->title->start();?>
<title>i'm index title</title>
<?php $this->plugin('capture')->title->end();?>

<?php $this->load('layout.html');?>

#index.html输出
<html>
<title>i'm index title</title>
</html>


capture插件支持嵌套使用

#index.html
<?php $this->plugin('capture')->title->start();?>
<?php $this->plugin('capture')->meta->start();?>
<meta />
<?php $this->plugin('capture')->meta->end();?>
<title>i'm index title</title>
<?php $this->plugin('capture')->meta->insert();?>
<?php $this->plugin('capture')->title->end();?>

<?php $this->load('layout.html');?>

#index.html输出
<html>
<title>i'm index title</title>
<meta />
</html>
*/

class Feather_View_Plugin_Capture{
	protected $vars = array();

	public function __get($name){
		return isset($this->vars[$name]) ? $this->vars[$name] : ($this->vars[$name] = new _Feather_View_Plugin_Capture);
	}

	public function start($name){
		$this->$name->start();
	}

	public function end($name){
		$this->$name->end();
	}

	public function insert($name){
		$this->$name->insert();
	}
}

class _Feather_View_Plugin_Capture{
	protected $content = '';

	public function start(){
		ob_start();
	}

	public function end(){
		$this->content = ob_get_contents();
		ob_end_clean();
	}

	public function insert(){
		echo $this->content;
	}
}