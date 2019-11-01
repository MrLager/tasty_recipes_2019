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

class DeleteComment extends AbstractRequestHandler {
    
    private $commentId;

    public function setcommentId($commentId) {
        $this->commentId = $commentId;
    }

    protected function doExecute() {
      
        
        $contr = $this->session->get('CHAT_CONTR_KEY');
        $contr->delete_comment($this->commentId);
        //$this->addVariable(Constants::CHAT_ENTRIES_VAR, $contr->getConversation(TRUE));
        // $this->addVariable(Constants::CHAT_USERNAME_VAR, $contr->getUsername());

        return 'recipe';
    }

}