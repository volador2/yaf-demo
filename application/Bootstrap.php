<?php
/**
 * 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */

use Volador\Log\LogConfig;
use Volador\Helpers\UUID;

class Bootstrap extends Yaf_Bootstrap_Abstract
{
    /**
     * [_init description]
     * @param  Dispatcher $dispatcher [description]
     * @return [type]                 [description]
     */
    public function _init(Yaf_Dispatcher $dispatcher)
    {
        // 运行环境
        $env = ini_get('yaf.environ');
        defined('APP_ENV') or define('APP_ENV', $env);

        // TODO:
    }

    /**
     * 引入 Composer AutoLoader 加载机制
     * @param  Dispatcher $dispatcher [description]
     * @return [type]                 [description]
     */
    public function _init_ComposerAutoload(Yaf_Dispatcher $dispatcher)
    {
        $config = Yaf_Application::app()->getConfig();

        $autoload_file = $config['application']['autoload_path'];
        if (!file_exists($autoload_file)) {
            die("{$autoload_file} not found, exit !!!");
        }

        require($autoload_file);
    }

    /**
     * 配置Logger选项
     * @param  Dispatcher $dispatcher [description]
     * @return [type]                 [description]
     */
    public function _init_Logger(Yaf_Dispatcher $dispatcher)
    {
        $config = new Yaf_Config_ini(APP_PATH . '/conf/log.ini', APP_ENV);

        // 配置日志文件
        $log_file = $config->log->file;
        if (is_null($log_file)) {
            dir ("not found: log.file in log.ini, exit!!!");
        }

        $log_dir = dirname($log_file);
        if (!file_exists($log_dir)) {
            dir ("{$log_dir} not found, exit!!!");
        }

        LogConfig::logfile($log_file);

        // 设置模版
        $log_tpl = $config->log->format;
        if ($log_tpl) {
            LogConfig::template($log_tpl);
        }

        // 非CLI模式自动配置TRACE_ID,
        if (PHP_SAPI !== 'cli' || 1) {

            // 建议在Nginx中配置TRACE_ID
            if (!isset($_REQUEST['TRACE_ID'])) {
                $_REQUEST['TRACE_ID'] = UUID::TRACE_ID();
            }

            LogConfig::setTemplateVal('TRACE_ID', $_REQUEST['TRACE_ID']);
        }
    }
}
