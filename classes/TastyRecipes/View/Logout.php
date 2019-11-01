<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Chat\Controller\Controller;
use Chat\Util\Constants;

/**
 * This class stores the user user name
 *
 * @author Simon Lagerqvist, simlag@kth.se
 */
class Logout extends AbstractRequestHandler {

    protected function doExecute() {
      
        
        $contr = $this->session->get('CHAT_CONTR_KEY');
        $contr->loggout();
        $this->session->set('CHAT_CONTR_KEY', $contr);

        //$this->addVariable(Constants::CHAT_ENTRIES_VAR, $contr->getConversation(TRUE));
        // $this->addVariable(Constants::CHAT_USERNAME_VAR, $contr->getUsername());

        return 'index';
    }

}