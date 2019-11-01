<?php

namespace TastyRecipes\View;
use Id1354fw\View\AbstractRequestHandler;

/*returns the index page of the webbaplication*/
class RegisterEntered extends AbstractRequestHandler{
    private $userName;
    private $pass;
    private $email;

    public function setemail($email) {
        $this->email = $email;
    }
    
    public function setuser_name($user_name) {
        $this->userName = $user_name;
    }

    public function setpass($pass) {
        $this->pass = $pass;
    }

    protected function doExecute() {
      
        $contr = $this->session->get('CHAT_CONTR_KEY');

        if(!$contr->register_user($this->userName, $this->pass, $this->email))
        {
            // echo("username exits");
            $this->addVariable("userNameExist", "username already exists, please try onther username!");
            return 'register';
        }
       
        //$this->addVariable(Constants::CHAT_ENTRIES_VAR, $contr->getConversation(TRUE));
        // $this->addVariable(Constants::CHAT_USERNAME_VAR, $contr->getUsername());

        return 'index';
    }
} 