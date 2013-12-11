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
 * 
 * 
 * @property array $modules buh module uud
 * @property array $enabled_modules zuvhun idevhjsen module uud
 */
class Module {

    public static $app_dir = '';
    public static $all_modules = array();
    public static $enabled_modules = array();

    public function __construct() {
        $this->setAppDir();
    }

    public static function getAllModuleRouters() {
        $modules = self::$enabled_modules;
        if (file_exists()) {
            
        }
    }

    /**
     * buh module iig avna
     */
    static function getAllModules() {

        self::setAppDir();

        $all_modules = Dir::getAllDirectories(self::getAppDir() . 'modules' . DS);

        Config::set('modules', $all_modules);
        return $all_modules;
    }

    /**
     * buh idevhtei module iig avna
     */
    static function getAllEnabledModules() {

        $all_modules = self::getAllModules();
        $_enabled_modules = array();

        
        if (is_array($all_modules)) {
            foreach ($all_modules as $k => $v) {
                if (file_exists(self::$app_dir . 'modules' . DS . $v . DS . 'config.php')) {
                    require_once self::$app_dir . 'modules' . DS . $v . DS . 'config.php';
                    if($enabled_modules[$v] == 1){
                        $_enabled_modules[$v] = $v;
                    }
                }
            }
        }
        Config::set('enabled_modules', $_enabled_modules);
        return $_enabled_modules;
    }

    public static function getAppDir() {

        self::setAppDir();

        return self::$app_dir;
    }

    public static function setAppDir() {

        self::$app_dir = DIR_APP . ENABLED_APP . DS;
    }

}
