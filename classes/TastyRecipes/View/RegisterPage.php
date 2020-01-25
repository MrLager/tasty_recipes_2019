<?php

namespace TastyRecipes\View;
use Id1354fw\View\AbstractRequestHandler;

/*returns the registration page of the webbaplication*/
class RegisterPage extends AbstractRequestHandler{
    protected function doExecute() {
        return 'register';
    }
} 