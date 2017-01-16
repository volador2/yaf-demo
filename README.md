Yaf 框架示例
============

 - 如果你还不了解Yaf, 请查看 [Yaf手册](http://www.laruence.com/manual)
 - 如果你还不了解Composer, 请查看 [Composer中文网](http://docs.phpcomposer.com/00-intro.html)

`如果你没有红杏, 推荐使用国内Composer镜像源, 配置方法见(http://pkg.phpcomposer.com)`

##Install

###安装volador2组件
```
~/composer.phar require volador2/log
~/composer.phar require volador2/mysql
~/composer.phar require volador2/redis
```

###配置库文件地址

在application.ini中指定autoload.php的路径, 建议使用绝对地址

```
application.autoload_path="/path/../vendor/autoload.php"
```

##结束