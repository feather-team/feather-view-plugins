capture插件
=======================================================

capture插件，用于捕获一段执行后的模板代码，可在任意地方进行insert，将其内容插入目标位置。

###API

* start($name): 开始执行
* end($name): 停止执行并捕获
* insert($name): 插入捕获名为name的捕获内容

###使用

layout.html
```php
<html>
<?php $this->plugin('capture')->insert('title');?>
</html>
```

index.html
```php
<?php $this->plugin('capture')->start('title');?>
<title>i'm index title</title>
<?php $this->plugin('capture')->end('title);?>

<!--load一个模板-->
<?php $this->load('layout.html');?>
```

index.html输出
```php
<html>
<title>i'm index title</title>
</html>
```

####capture插件同时支持一下使用

```php
<!--直接将捕获名作为插件返回对象的属性调用-->
<?php $this->plugin('capture')->title->start();?>
```


capture插件支持嵌套使用

index.html

```php
<?php $this->plugin('capture')->title->start();?>
<?php $this->plugin('capture')->meta->start();?>
<meta />
<?php $this->plugin('capture')->meta->end();?>
<title>i'm index title</title>
<?php $this->plugin('capture')->meta->insert();?>
<?php $this->plugin('capture')->title->end();?>
<?php $this->load('layout.html');?>
```

index.html输出

```html
<html>
<title>i'm index title</title>
<meta />
</html>
```
