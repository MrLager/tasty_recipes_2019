<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
// use Chat\Controller\Controller;
// use Chat\Util\Constants;
// require_once($_SERVER['DOCUMENT_ROOT'].'/classes/TastyRecipes/util/utilities.php');
// var_dump($_SERVER['DOCUMENT_ROOT'].'/classes/TastyRecipes/util/utilities.php');


function obj2array ( &$Instance ) {
    $clone = (array) $Instance;
    $rtn = array ();
    $rtn['___SOURCE_KEYS_'] = $clone;

    while ( list ($key, $value) = each ($clone) ) {
        $aux = explode ("\0", $key);
        $newkey = $aux[count($aux)-1];
        $rtn[$newkey] = &$rtn['___SOURCE_KEYS_'][$key];
    }

    return $rtn;
}
/**
 * This class is used for login
 *
 * @author Simon Lagerqvist, simlag@kth.se
 */
class Login extends AbstractRequestHandler {

    private $user_name;
    private $pass;

    public function setuserName($userName) {
        $this->user_name = $userName;
    }

    public function setpass($pass) {
        $this->pass = $pass;
    }

    protected function doExecute() {
      
        
        $contr = $this->session->get('TASTY_CONTR_KEY');
        
        if($contr->get_user_login_status())
        {
            $varre = obj2array($contr->get_user());
            $this->addVariable('jsonData', $varre);
            $this->session->set('TASTY_CONTR_KEY', $contr);

            return 'json-view';
        }
        else
        {
            $contr->set_user_name($this->user_name);
            $contr->set_user_pass($this->pass);
        }
        // if(!$contr->login($this->pass))
        // {
        //     $this->addVariable("credentialsInvalid", "login credentials does not match against anything in our system, please check the username and pass!");
        // }


        //$this->addVariable(Constants::CHAT_ENTRIES_VAR, $contr->getConversation(TRUE));
        // $this->addVariable(Constants::CHAT_USERNAME_VAR, $contr->getUsername());
        $vvvv = $contr->login($this->pass);
        $varre = obj2array($vvvv);
        $this->addVariable('jsonData', $varre);
        $this->session->set('TASTY_CONTR_KEY', $contr);

        return 'json-view';
    }

}