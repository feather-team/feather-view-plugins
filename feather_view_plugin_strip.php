<?php
/*
strip插件，用于对一段html标签内的内容去除空格。
注：该插件只是用于简单的空格去除，不能用于对内联script标签内的内容进行替换

#layout.html
<?php $this->plugin('strip')->start();?>
<html>
	<div id="test">
		hello, world
	</div>
</html>
<?php $this->plugin('strip')->end();?>

#output:
<html><div id="test">hello,world</div></html>
*/
class Feather_View_Plugin_Strip{
	public function start(){
		ob_start();
	}

	public function end(){
		$content = ob_get_contents();
		ob_end_clean();
		echo preg_replace_callback('#<[^>]+>|(\s+)#', 'self::strip', $content);
	}

	protected static function strip($all){
		if(isset($all[1])){
			return '';
		}

		return $all[0];
	}
}