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

    
    public function __construct($config) {

        //buh app uudiin jagsaalt
        App::getAllApps();
//        $config = new Config($config);
        foreach($config as $k=>$v){
            define(strtoupper($k),$v);
        }
        
        Config::set('layout',DEFAULT_LAYOUT);
        
        return $config;
    }
    
    static function getSession(){
        
    }

}
