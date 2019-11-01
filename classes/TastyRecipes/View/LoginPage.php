<?php

namespace TastyRecipes\View;
use Id1354fw\View\AbstractRequestHandler;

/*returns the index page of the webbaplication*/
class LoginPage extends AbstractRequestHandler{
    protected function doExecute() {
        $contr = $this->session->get('CHAT_CONTR_KEY');
        
        if($contr->get_user_login_status())
        {
            $contr->loggout();
            return 'index';
        }
        
        return 'loginpage';
    }
} 