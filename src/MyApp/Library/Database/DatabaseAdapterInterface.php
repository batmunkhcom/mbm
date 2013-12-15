<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MyAppLibraryDatabase;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
interface DatabaseAdapterInterface
{
    function connect();
    
    function disconnect();  
    
    function query($query);
    
    function fetch();  
    
    function select($table, $conditions, $fields, $order, $limit, $offset);
    
    function insert($table, array $data);
    
    function update($table, array $data, $conditions);
    
    function delete($table, $conditions);
    
    function getInsertId();
    
    function countRows();
    
    function getAffectedRows();
}