<?php
namespace App\Listeners;
use Phalcon\Mvc\Collection;
use Phalcon\Di\Injectable;
use Phalcon\Events\Event;
use Phalcon\Acl\Adapter\Memory;


Class NotificationListner extends Injectable
{
    public function IndexAction(){

    }
    public function beforeHandleRequest(Event $event, \Phalcon\Mvc\Application $application){
        // echo "h";
        // die;
        // $role = $application->request->get('role');
        // echo $role;
        // die;
        $aclFile = APP_PATH . '/security/acl.cache';
        if (true === is_file($aclFile)) {
            $acl = unserialize(file_get_contents($aclFile));
            $bearer = $application->request->get('bearer')??'invalidToken';
            $controller = $application->router->getControllerName() ?? 'index';
            $action = $application->router->getActionName() ?? 'index';
            // echo $controller , $action;
            die;
            try {
                $parser = new Parser();
                $role = $parser->parse($bearer)->getClaims()->getPayload()['sub'];
                // die;

            } catch (\Exception $e) {
                echo "Try valid token please !";
                die;
            }
            if (!$role || true !== $acl->isAllowed($role, $controller, $action)) {

                echo 'denied';
                die;
            }
        }
       
}
}