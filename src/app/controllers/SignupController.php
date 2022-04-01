<?php
// session_start();

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
        // echo $check;
        // $data = $this->model('Users')::find_by_username($username);
        // $data = Users::query()
        // ->insert
        // ->where("username = '$username'")
        // ->andWhere("password = '$password'")
        // ->execute();
        // print_r($data);
// --------------- JWT Token Generator --------------------------------------///\


$signer  = new Hmac();

        // Builder object
        $builder = new Builder($signer);

        $now        = new DateTimeImmutable();
        $issued     = $now->getTimestamp();
        $notBefore  = $now->modify('-1 minute')->getTimestamp();
        $expires    = $now->modify('+1 day')->getTimestamp();
        $passphrase = 'QcMpZ&b&mo3TPsPk668J6QH8JA$&U&m2';

        // Setup
        $builder
            ->setAudience('https://target.phalcon.io')  // aud
            ->setContentType('application/json')        // cty - header
            ->setExpirationTime($expires)               // exp 
            ->setId('abcd123456789')                    // JTI id 
            ->setIssuedAt($issued)                      // iat 
            ->setIssuer('https://phalcon.io')           // iss 
            ->setNotBefore($notBefore)                  // nbf
            ->setSubject($check)   // sub
            ->setPassphrase($passphrase)                // password 
        ;

        // Phalcon\Security\JWT\Token\Token object
        $tokenObject = $builder->getToken();

// -----------------------generated -----------------------------------------------------


        $escaper = new Escaper();

        $inputdata = array(
            "username" => $escaper->escapeHtml($this->request->getPost('username'),),
            "password" => $escaper->escapeHtml($this->request->getPost('password'),),
            'jwt' => $tokenObject->getToken()

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
