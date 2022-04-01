<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;
use Phalcon\Escaper;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\Stream;
class AddproController extends Controller
{
    public function IndexAction(){
        // $postdata = $_POST ?? array();
        // echo "<pre>";
        // print_r($postdata);
        // echo "</pre>";
        // die();


    }
    public function addAction()
    {
        $postdata = $_POST ?? array();

            $request = new Request();
            $product = new Products();
            $escaper = new Escaper();
            $def = new Settings();

            $inputdata = array(
                "name" => $escaper->escapeHtml($this->request->getPost('name'),),
                "discription" => $escaper->escapeHtml($this->request->getPost('discription'),),
                "tags" => $escaper->escapeHtml($this->request->getPost('tags'),),
                "price" => $escaper->escapeHtml($this->request->getPost('price'),),
                "stock" => $escaper->escapeHtml($this->request->getPost('stock'),)

            );
            if($price == ''){
                $var = $this->di->get('eventsManager');
                $input = $var->fire('main:price',$this,$inputdata);
                $inputdata['price'] = $input->price; 
            }
            if($stock == ''){
                $var = $this->di->get('eventsManager');
                $input = $var->fire('main:stock',$this,$inputdata);
                $inputdata['stock'] = $input->stock; 
            }
            if($zipcode == ''){
                $var = $this->di->get('eventsManager');
                $input = $var->fire('main:zip',$this,$inputdata);
                $inputdata['zipcode'] = $input->zipcode; 
            }
            // echo "<pre>";
            // print_r($inputdata['name']);
            // die();
            $evnt = $this->di->get('eventsManager');
            $inputdata = $var->fire('main:tag',$this,$inputdata);

            $product->assign(
                $inputdata,
                    [
                    'name',
                    'discription',
                    'tags',
                    'stock',
                    'price'
                    ]
            );
            $product->save();
            header('Location:http://localhost:8080/');
    }


}