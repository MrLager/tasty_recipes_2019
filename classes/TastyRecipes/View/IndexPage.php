<?php

namespace TastyRecipes\View;
use Id1354fw\View\AbstractRequestHandler;

/*returns the index page of the webbaplication*/
class IndexPage extends AbstractRequestHandler{
    protected function doExecute() {
        return 'index';
    }
} 