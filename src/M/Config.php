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
 * @property array $data[modules] buh module uud
 * @property array $data[enabled_modules] zuvhun idevhjsen module uud
 */
class Config {

    public static $data = array();

    public function __construct($data = array()) {
        Config::$data = $data;
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
