<?php

/*
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
 * @subpackage Language
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id
 */
class Language {

    public static $words = array();
    public $langFilesDir;
    public $langFiles = array();

    public function __construct($ln = 'mn') {
        if (DIR_CORE . 'lang' . DS . $ln . DS . 'index.lang.php') {
            $this->langFilesDir = DIR_CORE . 'lang' . DS . $ln . DS;
            log_send('Language file not found. (' . $ln . ').', 3);
        } else {
            $this->langFilesDir = DIR_CORE . 'lang' . DS . strtolower(DEFAULT_LANG) . DS;
            log_send('Language file not found. (' . $ln . ').', 3);
        }
        $this->langFiles = File::getFiles($this->langFilesDir, 'php');

        $lang = array();
        foreach ($this->langFiles as $k => $v) {
            require_once $v;
        }
        self::$words = $lang;
    }

    public function __($txt = '') {

        if (!isset($this->words[$txt])) {
            log_send('$lang[\'' . $txt . '\'] word not found.', 3);
            return $txt;
        }
        return $this->words[$txt];
    }

    static function get($txt = '') {

        if (!isset(self::$words[$txt])) {

            log_send('$lang[\'' . $txt . '\'] word not found.', 3);
            return $txt;
        }
        return self::$words[$txt];
    }

}