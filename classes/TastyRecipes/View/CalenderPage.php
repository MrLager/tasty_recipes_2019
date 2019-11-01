<?php

namespace TastyRecipes\View;
use Id1354fw\View\AbstractRequestHandler;

/*returns the index page of the webbaplication*/
class CalenderPage extends AbstractRequestHandler{
    protected function doExecute() {
        return 'calender';
    }
} 