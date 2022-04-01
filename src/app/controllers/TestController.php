<?php

use Phalcon\Http\Request;
use Phalcon\Escaper;
use Phalcon\Mvc\Controller;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\Stream;


class TestController extends Controller
{
    public function indexAction(){

    }
    public function eventtestAction(){
        // $datehelper = new \App\Components\DateHelper();
        // echo $datehelper->getCurrentDate();
        echo "<br>hello";
    }
}