<?php
define("APP_PATH",  realpath(dirname(__FILE__) . '/../'));
$app = new Yaf_Application(APP_PATH . "/conf/application.ini");
$app->bootstrap()->execute("main");

/**
 * php easy and log script
 * @since [version> [<description>]
 * @author [name] <[<email address>]>
 */

use Volador\Log\Logger;
use Volador\Log\LogConfig;

use Volador\Helpers\UUID;

function main()
{
    for (;;) { 
        LogConfig::setTemplateVal('TRACE_ID', UUID::TRACE_ID());

        Logger::debug('hello, {name}', ['name' => 'Lin{name}']);
        Logger::debug('hello, {name}', ['name' => 'Lin{name}']);
        Logger::debug('hello, {name}', ['name' => 'Lin{name}']);
        Logger::debug('hello, {name}', ['name' => 'Lin{name}']);
        Logger::debug('hello, {name}', ['name' => 'Lin{name}']);

        $mem_usage = memory_get_usage();
        printf("%d\n", $mem_usage);
        usleep(100 * 1000);

        Logger::fflush();
    }
    echo "the end!!!" . PHP_EOL;
}
