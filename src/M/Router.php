<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class Router extends \Klein\Klein {

    public $router;

    public function __construct() {

        $this->router = load_router('klein');
        Config::set('router', $this->router);
    }

//    public function find_route() {
//
//        $this->routes;
//    }
//    public function links() {
//
//        return $this->_get_compiled_routes();
//    }

}
