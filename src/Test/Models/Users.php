<?php
/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D\Models;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class Users
{
    protected $_adapter; 
    protected $_cache;
    
    /**
     * Constructor
     */
    public function __construct(D\Interfaces\DatabaseAdapterInterface $adapter, M\Cache\CacheableInterface $cache)
    {
        $this->_adapter = $adapter;
        $this->_cache = $cache;
    }
    
    /**
     * Fetch a user by their ID
     */
    public function fetchById($id)
    {
        // try to fetch user data from the cache system
        if ($user = $this->_cache->get($id)) {
            return $user;
        }
        // otherwise fecth user data from the database
        $this->_adapter->select('users', "id = $id");
        if ($user = $this->_adapter->fetch()) {
            $this->_cache->set($id, $user);
            return $user;
        }
        return null;
    }
    
    /**
     * Fetch all users
     */
    public function fetchAll()
    {
        // try to fetch users data from the cache system
        if ($users = $this->_cache->get('all')) {
            return $users;
        }
        // otherwise fecth users data from the database
        $this->_adapter->select('users');
        $users = array();
        while ($user = $this->_adapter->fetch()) {
            $users[] = $user;
        }
        if (count($users) !== 0) {
           $this->_cache->set('all', $users); 
        }
        return $users;
    }
    
    /**
     * Insert new user data (the cache is cleared also)
     */
    public function insert(array $data)
    {
        if ($insertId = $this->_adapter->insert('users', $data)) {
            $this->_cache->clear();
            return $insertId;
        }
        return false;
    }
    
    /**
     * Delete the table row corresponding to the specified user (the cache is cleared also)
     */ 
    public function delete($id)
    {
        if ($affectedRow = $this->_adapter->delete('users', "id = $id")) {
            $this->_cache->clear();
            return $affectedRow; 
        }
        return false;
    }    
} 