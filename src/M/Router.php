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
class Router {

    public $router;

    public function __construct() {

        $this->router = $this->loadRouter();
        Config::set('router', $this->router);
    }

    public function loadRouter() {

        //module iin router iig avah

        $router = new \Klein\Klein();

        //buh huseltuuded ajillah
        $router->respond(function () {
            return '';
        });

        require_once DIR_CORE . 'app/' . APP_ENABLED . '/config/routing.php';

        //module iin router uudiig duudah
        Module::getAllModuleRouters($router);

        // Run it!
        $router->dispatch();

        return $router;
    }

}
