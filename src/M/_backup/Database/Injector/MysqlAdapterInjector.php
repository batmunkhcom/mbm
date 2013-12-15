<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M\Database\Injector;
use M\Database\Library\Database;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class MysqlAdapterInjector implements InjectorInterface
{
    protected static $_mysqlAdapter;

    /**
     * Create an instance of the MysqlAdapter class
     */
    public function create()
    {
        if (self::$_mysqlAdapter === null) {
           self::$_mysqlAdapter = new Database\MysqlAdapter(array(
                'host', 
                'user', 
                'password', 
                'database'
            ));
        }
        return self::$_mysqlAdapter;
    }
}

