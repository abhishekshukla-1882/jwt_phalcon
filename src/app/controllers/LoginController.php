<?php
// session_start();

use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;


class LoginController extends Controller
{
    public function indexAction()
    {
        // echo "hg";
        $coo = $this->cookies->has('username');
        // die();
        if($coo){
            header('Location:http://localhost:8080/user/dashboared');
        }
        // $postdata = $_POST ?? array();
        // $username = $_POST['username'];
        // $password = $_POST["password"];
        // // echo $password;
        // print_r($postdata);
        // $postdata = $_POST ?? array();
        // print_r($postdata);
        // $this->view->tum=Posts::find();
        // return '<h1>Hello World!</h1>';
    }
    // public function logoutAction(){
        
    // }
    public function randomAction(){
        

        $request = new Request();
        if (true === $request->isPost('submit')) {
        $username = $request->get('username');
        $password = $request->get('password');
        $check = $request->get('check');
        // echo $check;
        // $data = $this->model('Users')::find_by_username($username);
        $data = Users::query()
        ->where("username = '$username'")
        ->andWhere("password = '$password'")
        ->execute();
        // print_r($data);


        }
        if(count($data)>0){
            if($data[0]->username == $username && $data[0]->password == $password){
                // redirect('user/dash');
                // return $this->
                // $response->redirect('');
                if($check=='checked'){
                    $this->view->is_sess = $this->session->set('username',$username);
                    $this->cookies->useEncryption(false);
                    $this->cookies->set(
                        'username',$username
                    );
            }

                // $this-
                header('Location:http://localhost:8080/user/dashboared');

            }
        }else{
            
        }
        // echo "<pre>";
        // print_r($data->username);
        // echo "</pre>";


        // echo $password;
       

    }

}