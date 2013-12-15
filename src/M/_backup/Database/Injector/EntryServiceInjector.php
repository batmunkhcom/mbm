<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M\Database\Injector;
use M\Database\Library\Database,
    M\Database\Model\Mapper,
    M\Database\Service;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class EntryServiceInjector implements InjectorInterface
{
    /**
     * Create the entry service
     */
    public function create()
    {
        $mysqlInjector = new MysqlAdapterInjector;
        $mysqlAdapter = $mysqlInjector->create();
        return new Service\EntryService(
            new Mapper\EntryMapper(
                $mysqlAdapter, new Mapper\CommentMapper(
                    $mysqlAdapter, new Mapper\AuthorMapper($mysqlAdapter)
                )
            )
        );  
    }
}