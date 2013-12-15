<?php
/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D\Interfaces;

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
    public function connect();
    
    public function disconnect();  
    
    public function query($query);
    
    public function fetch();  
    
    public function select($table, $where, $fields, $order, $limit, $offset);
    
    public function insert($table, array $data);
    
    public function update($table, array $data, $where);
    
    public function delete($table, $where);
    
    public function getInsertId();
    
    public function countRows();
    
    public function getAffectedRows();
}