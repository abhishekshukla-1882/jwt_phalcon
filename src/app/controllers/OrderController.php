<?php 

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;
use Phalcon\Escaper;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\Stream;
class OrderController extends Controller
{

    public function IndexAction()
    {

    }
    public function placeAction()
    {
        $postdata = $_POST ?? array();

        $request = new Request();
        $product = new Orders();
        $escaper = new Escaper();

        $inputdata = array(
            "name" => $escaper->escapeHtml($this->request->getPost('name'),),
            "address" => $escaper->escapeHtml($this->request->getPost('address'),),
            "zipcode" => $escaper->escapeHtml($this->request->getPost('zipcode'),),
            "product" => $escaper->escapeHtml($this->request->getPost('product'),),
            "quantity" => $escaper->escapeHtml($this->request->getPost('quantity'),)

        );

        $product->assign(
            $this->request->getPost(),
                [
                'name',
                'address',
                'zipcode',
                'product',
                'quantity'
                ]
        );
        $product->save();
        header('Location:http://localhost:8080/');

    }
    public function listAction(){
        $this->view->data = Orders::find();
    }
}