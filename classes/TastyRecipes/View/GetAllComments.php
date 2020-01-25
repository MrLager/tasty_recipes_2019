<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Chat\Controller\Controller;
use Chat\Util\Constants;

/**
 * This class will get all comments given a spcific recipe id
 *
 * @author Simon Lagerqvist, simlag@kth.se
 */
class GetAllComments extends AbstractRequestHandler {

    private $dishId;

    public function setdishId($dishId) {
        $this->dishId = $dishId;
    }


    protected function doExecute() {
      
        $contr = $this->session->get('TASTY_CONTR_KEY');
        $comments = $contr->get_all_comments($this->dishId);
        
        $this->addVariable('jsonData', $comments);

        return 'json-view';
    }

}