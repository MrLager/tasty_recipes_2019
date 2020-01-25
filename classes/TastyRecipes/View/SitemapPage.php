<?php

namespace TastyRecipes\View;

use Id1354fw\View\AbstractRequestHandler;
use Chat\Controller\Controller;
use Chat\Util\Constants;

/**
 * This class returns the site map page
 *
 * @author Simon Lagerqvist, simlag@kth.se
 */
class SitemapPage extends AbstractRequestHandler {

    protected function doExecute() {
        return 'sitemap';
    }

}