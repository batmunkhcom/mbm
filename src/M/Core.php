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
class Core {

    public $router;

    public function __construct() {

        Module::setAppDir();
        $this->router = $this->loadRouter();
        Config::set('router', $this->router);
        
    }

    public function loadRouter() {

        //module iin router iig avah

        $router = new Router();

        require_once DIR_CORE . 'app/' . ENABLED_APP . '/config/routing.php';

        Module::getAllModuleRouters($router);
        
        // Run it!
        $router->run();

        return $router;
    }

    public function loadConfig() {

        $config = new Config();
    }

}
