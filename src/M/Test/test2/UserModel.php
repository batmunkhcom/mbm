<?php

namespace M\Test;

class UserModel extends AbstractEntity
{
    protected $_adapter; 
    protected $_cache;
    
    /**
     * Constructor
     */
    public function __construct(DatabaseAdapterInterface $adapter, \M\Cache\CacheableInterface $cache)
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
        $this->_adapter->select('users','id!=0','*','id');
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
            $this->_cache->delete($insertId);
            $this->_cache->delete('all');
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
            $this->_cache->clear($id);
            return $affectedRow; 
        }
        return false;
    }    
} 