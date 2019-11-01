<?php

namespace TastyRecipes\View;

use Id1354fw\Util\Classes;

use TastyRecipes\Controller\Controller;
use Id1354fw\View\AbstractRequestHandler;

/*redirects the user to the index page in the case that there is
no matching request handler*/
class DefaultRequestHandler extends AbstractRequestHandler{

    protected function doExecute() {
        $this->session->restart();
        $this->session->set('CHAT_CONTR_KEY', new Controller());
        \header('Location: /tasty/TastyRecipes/View/IndexPage');
    }
}