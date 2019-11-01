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
class SitemapPage extends AbstractRequestHandler {

    protected function doExecute() {
        return 'sitemap';
    }

}