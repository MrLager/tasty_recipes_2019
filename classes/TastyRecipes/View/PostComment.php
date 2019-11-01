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

class PostComment extends AbstractRequestHandler {
    
    private $comment;
    private $dishId;

    public function setcomment($comment) {
        $this->comment = $comment;
    }

    public function setdishId($id) {
        $this->dishId = $id;
    }

    protected function doExecute() {
      
        
        $contr = $this->session->get('CHAT_CONTR_KEY');
        $comment = $contr->store_comment($this->comment, $this->dishId);
        $this->addVariable('jsonData', $comment);
        // $this->addVariable(Constants::CHAT_USERNAME_VAR, $contr->getUsername());

        return 'json-view';
    }

}