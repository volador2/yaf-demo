<?php
/**
* 演示说明
* @author [name] <[<email address>]>
* @since [version> [<description>]
*/

class IndexController extends Yaf_Controller_Abstract
{
    /**
     * [indexAction description]
     * @return [type] [description]
     */
    public function indexAction()
    {
        $this->getView()->assign("content", "Hello World");
    }

    /**
     * ajax request
     * @return [type] [description]
     */
    public function ajaxAction()
    {
        Yaf_Dispatcher::getInstance()->disableView();

        header("Content-type: application/json; charset=utf-8");
        echo json_encode(['a' => '11111']);
    }
}