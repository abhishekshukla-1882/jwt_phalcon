<?php
// session_start();
include(APP_PATH . '/library/vendor/autoload.php');
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Phalcon\Http\Request;
use Phalcon\Escaper;
use Phalcon\Mvc\Controller;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\Stream;

use Phalcon\Security\JWT\Builder;
use Phalcon\Security\JWT\Signer\Hmac;
use Phalcon\Security\JWT\Token\Parser;
use Phalcon\Security\JWT\Validator;


class SignupController extends Controller
{
    public function indexAction()
    {
       

    $adapter = new Stream('../app/logs/log.log');
    $logger  = new Logger(
        'messages',
        [
            'main' => $adapter,
        ]
    );

    $logger->error('Something went wrong');
    }
    public function subAction(){
        $request = new Request();
        $user = new Users();
        if (true === $request->isPost('submit')) {
            $username = $request->get('username');
            $password = $request->get('password');
            $check = $request->get('check');
        }

        signer  = new Hmac();

        // Builder object
        $builder = new Builder($signer);

        $now        = new \DateTimeImmutable();
        $issued     = $now->getTimestamp();
        $notBefore  = $now->modify('-1 minute')->getTimestamp();
        $expires    = $now->modify('+1 day')->getTimestamp();
        $passphrase = 'QcMpZ&b&mo3TPsPk668J6QH8JA$&U&m2';

        // Setup
        // $builder
        //     ->setAudience('https://target.phalcon.io')  // aud
        //     ->setContentType('application/json')        // cty - header
        //     ->setExpirationTime($expires)               // exp 
        //     ->setId('abcd123456789')                    // JTI id 
        //     ->setIssuedAt($issued)                      // iat 
        //     ->setIssuer('https://phalcon.io')           // iss 
        //     ->setNotBefore($notBefore)                  // nbf
        //     ->setSubject($check)   // sub
        //     ->setPassphrase($passphrase)                // password 
        // ;

        // // Phalcon\Security\JWT\Token\Token object
        // $tokenObject = $builder->getToken();
        $key = "key";

        $payload = array(
            "iss" => $this->url->getBaseUri(),
            "aud" => $this->url->getBaseUri(),
            "iat" => $issued,
            "nbf" => $notBefore,
            "exp" => $expires,
            "role" => $check
        );
        // print_r($payload);
        $token = JWT::encode($payload, $key, 'HS256');
        // $user->token = $token;
        // print_r($token);
        // die;

// -----------------------generated -----------------------------------------------------


        $escaper = new Escaper();

        $inputdata = array(
            "username" => $escaper->escapeHtml($this->request->getPost('username'),),
            "password" => $escaper->escapeHtml($this->request->getPost('password'),),
            'jwt' => $token

        );
        $user->assign(
            $inputdata,
            [
            'username',
            'password',
            'jwt'
            ]
        );
        $user->save();
        // echo "done";
        // die();


        }

    }
