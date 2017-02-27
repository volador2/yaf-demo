<?php
define("APP_PATH",  realpath(dirname(__FILE__) . '/../'));
$app = new Yaf_Application(APP_PATH . "/conf/application.ini");
$app->bootstrap()->execute("main");

/**
 * DB
 * @since [version> [<description>]
 * @author [name] <[<email address>]>
 */

use Volador\Db\Mysql;
use Volador\Db\DBConfig;

function main()
{

    /**
     * 单主或多主数据库
     ***********/
    $op1 = array(
         'host' => ['127.0.0.1'],
         'username' => 'root',
         'password' => '',
         'name' => 'test',
         'port' => 3306,
         'charset' => 'utf8',
    );
    DBConfig::addServer('db1', $op1);
    $c1 = Mysql::Connect('db1', true);

    printf("\n== The End ==\n");

    /**
     * 主从
     ********/
    // $op2 = array(
    //      'master' => ['127.0.0.1', '127.0.0.2'],
    //      'slaves' => ['127.0.1.1', '127.0.1.2', '127.0.1.3'],
    //      'username' => 'root',
    //      'password' => '',
    //      'name' => 'test',
    //      'port' => 3306,
    //      'charset' => 'utf8',
    // );
    // DBConfig::addServer('db2', $op2);
    // $c2 = Mysql::Connect('db2', false);
}
