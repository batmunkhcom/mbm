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
 * @property array $module_enabled zuvhun idevhjsen module uud
 */
class Module {

    public static $current_app_dir = '';
    public static $module_all = array();
    public static $module_enabled = array();

    public function __construct() {
//        self::setAppDir();
    }

    /**
     * buh module iig avna
     */
    static function getAllModules() {

        $module_current_dir = self::$current_app_dir . 'modules' . DS;
        $module_all = Dir::getAllDirectories($module_current_dir);

        Config::set('modules', $module_all);
        Config::set('module_current_dir', $module_current_dir);

        return $module_all;
    }

    /**
     * buh idevhtei module iig avna
     */
    static function getAllEnabledModules() {

        $module_all = self::getAllModules();
        $_enabled_modules = array();


        if (is_array($module_all)) {
            foreach ($module_all as $k => $v) {
                if (file_exists(self::$current_app_dir . 'modules' . DS . $v . DS . 'config.php')) {
                    require_once self::$current_app_dir . 'modules' . DS . $v . DS . 'config.php';
                    if ($is_enabled_module[$v] == 1) {
                        $_enabled_modules[$v] = $v;
                    }
                }
            }
        }

        self::setModuleEnabled($_enabled_modules);
        
        return $_enabled_modules;
    }

    public static function getAllModuleRouters(Router $router) {

        $modules = self::getAllEnabledModules();

        foreach ($modules as $k => $v) {
            if (file_exists(self::$current_app_dir . "modules" . DS . $v . DS . 'routing.php')) {
                require_once(self::$current_app_dir . "modules" . DS . $v . DS . 'routing.php');
            }
        }
    }

    public static function setModuleEnabled($_enabled_modules = array()) {

        Config::set('module_enabled', $_enabled_modules);
        self::$module_enabled = $_enabled_modules;
        $GLOBALS['is_enabled_module'] = $_enabled_modules;
    }

    public static function getAppDir() {

        return self::$current_app_dir;
    }

    public static function setAppDir() {

        self::$current_app_dir = DIR_APP . ENABLED_APP . DS;
    }

}
