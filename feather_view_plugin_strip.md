strip插件
=======================================================

strip插件，对一段html标签内的内容去除空格。

注：该插件只是用于简单的空格去除，不能用于对内联script标签内的内容进行替换

###API

* start(): 开始
* end(): 停止并输出结果

###使用

layout.html
```php
<?php $this->plugin('strip')->start();?>
<html>
	<div id="test">
		hello, world
	</div>
</html>
<?php $this->plugin('strip')->end();?>
```

output
```html
<html><div id="test">hello,world</div></html>
```