<?php
// session_start();
include(APP_PATH . '/library/vendor/autoload.php');
use Phalcon\Mvc\Controller;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class IndexController extends Controller
{
    public function indexAction()
    {


        // $expires    = $now->modify('+1 day')->getTimestamp();
        // $key = $this->config->jwt['passphrase'];
        // $payload = array(
        //     "iss" => $this->url->getBaseUri(),
        //     "aud" => $this->url->getBase
        // $payload = array(
        //     "iss" => $this->url->getBaseUri(),
        //     "aud" => $this->url->getBaseUri(),
        //     "iat" => $issued,
        //     "nbf" => $notBefore,
        //     "exp" => $expires,
        //     "role" => $post['role']
        // );
        




        // $payload = array(
        //     "iss" => "http://example.org",
        //     "aud" => "http://example.com",
        //     "iat" => 1356999524,
        //     "nbf" => 1357000000
        // );

        /**
         * IMPORTANT:
         * You must specify supported algorithms for your application. See
         * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
         * for a list of spec-compliant algorithms.
         */
        // $jwt = JWT::encode($payload, $key, 'HS256');
        // $decoded = JWT::decode($jwt, new Key($key, 'HS256'));
        // print_r($payload);
        // $token = JWT::encode($payload, $key, $this->config->jwt['algo']);
        // // $user->token = $token;

        // print_r($token);
        // die;
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
    public function listAction(){
        $this->view->data=Products::find();

    }
}