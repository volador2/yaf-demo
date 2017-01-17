<?php
/**
* Ajax 模块接口例子
* @author [name] <[<email address>]>
* @since [version> [<description>]
*/

class DemoController extends Yaf_Controller_Abstract
{
    public function init()
    {
        Yaf_Dispatcher::getInstance()->disableView();
    }

    /**
     * /api/demo/index
     * @return [type] [description]
     */
    public function indexAction()
    {
        header("Content-type: application/json; charset=utf-8");

        $v['name'] = 'Jome';
        $v['shux'] = mt_rand();
        echo json_encode($v);
    }
}