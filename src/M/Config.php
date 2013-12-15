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
 * Buh tohirgoonuudiig aguulna
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 * 
 * @property array $data Config iin set,get utguudiig aguulna
 * @property array $data[apps] buh application uud
 * @property array $data[app_enabled] Tuhain idevhtei app
 * @property array $data[module_all] buh module uud
 * @property array $data[module_enabled] zuvhun idevhjsen module uud
 * @property array $data[module_current] yag odoogiin module
 * @property array $data[module_current_dir] yag odoogiin module dir
 * @property array $data[action_current] yag odoogiin action
 */
class Config {

    public static $data = array();

    public function __construct($config = array()) {
        
        //undsen tohirgoonii utguud
        Config::$data = $config;
        foreach($config as $k=>$v){
            define(strtoupper($k),$v);
        }
        
        //buh app uudiin jagsaalt
        App::getAllApps();
        
    }

    static function get($key = '',$value=null) {
        
        if(!is_null($value)){
           self::set($key, $value);
        }
        
        if (isset(self::$data[$key])) {

            return self::$data[$key];
        } else {

            return null;
        }
    }

    static function set($key = '', $value = '') {

        self::$data[$key] = $value;
        return ;
    }

}
