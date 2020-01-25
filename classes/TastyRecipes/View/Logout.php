<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Chat\Controller\Controller;
use Chat\Util\Constants;

/**
 * This class is used to logout
 *
 * @author Simon Lagerqvist, simlag@kth.se
 */
class Logout extends AbstractRequestHandler {

    protected function doExecute() {
      
        
        $contr = $this->session->get('TASTY_CONTR_KEY');
        $contr->loggout();
        $this->session->set('TASTY_CONTR_KEY', $contr);

        //$this->addVariable(Constants::CHAT_ENTRIES_VAR, $contr->getConversation(TRUE));
        // $this->addVariable(Constants::CHAT_USERNAME_VAR, $contr->getUsername());

        return 'index';
    }

}