<?php
define("APP_PATH",  realpath(dirname(__FILE__) . '/../'));
$app = new Yaf_Application(APP_PATH . "/conf/application.ini");
$app->bootstrap()->execute("main");

/**
 * php easy and log script
 * @since [version> [<description>]
 * @author [name] <[<email address>]>
 */

use Volador\Helpers\UUID;

function main()
{
    for ($i=0; $i < 10; $i++) { 
        echo UUID::TRACE_ID() . PHP_EOL;
        // echo substr(md5(uniqid(mt_rand(), true)), -8) . PHP_EOL;
    }
    echo "the end!!!" . PHP_EOL;
}
