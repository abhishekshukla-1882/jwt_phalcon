<?php
// session_start();
use Phalcon\Mvc\Controller;


class UserController extends Controller
{
    public function indexAction()
    {
        // if ($this->cookies->has("login")) { 
        //     // Get the cookie 
        //     $loginCookie = $this->cookies->get("login"); 
            
        //     // Get the cookie's value 
        //     $value = $loginCookie->getValue(); 
        //     echo($value); 
        //  } 
    }
    public function dashboaredAction()
    {
        $coo = $this->cookies->has('username');
        // die();
        if($coo){
            $this->view->is_sess = $this->session;

            // header('Location:http://localhost:8080/user/dashboared');
        }else{
            header('Location:http://localhost:8080/login');

        }
        // echo $this->session->get('userdata');
        // die();
        // if ($this->cookies->has("login")) { 
        //     // echo "h";
        //     // die();
        //     // Get the cookie 
        //     $loginCookie = $this->cookies->get("login"); 
            
        //     // Get the cookie's value 
        //     $value = $loginCookie->getValue(); 
        //     // echo($value); 
        //     $this->view->tab = $value;
        // } 
    }
    public function logoutAction(){
        $uns = $this->cookies->get('username');
        $uns->delete('username');
        $this->session->remove('username');
        unset($this->session);
        header('Location:http://localhost:8080/login');
    }
}