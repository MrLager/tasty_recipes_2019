<?php

namespace TastyRecipes\View;
use Id1354fw\View\AbstractRequestHandler;

/*returns the login page*/
class LoginPage extends AbstractRequestHandler{
    protected function doExecute() {
        $contr = $this->session->get('TASTY_CONTR_KEY');
        
        if($contr->get_user_login_status())
        {
            $contr->loggout();
            return 'index';
        }
        
        return 'loginpage';
    }
} 