<?php
// session_start();
use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->data=Products::find();
        // $var = $this->di->get('eventsManager');
        // $this->view->event = $var->fire('main:before',$this);



        // print_r($this->date);
        // die();
        // $datehelper = new \App\Components\DateHelper();
        // // $this->view->tum=Posts::find();
        // echo $datehelper->getdate();
        // die();
        // return '<h1>Hello World!</h1>';
    }
    public function addproductAction(){
        
    }
}