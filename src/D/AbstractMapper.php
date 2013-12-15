<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace D;
/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
abstract class AbstractMapper
{
    protected $_adapter;
    protected $_entityTable;

    /**
     * Constructor
     */
    public function __construct(DatabaseInterface $adapter, $entityTable = null)
    {
        $this->_adapter = $adapter;
        // Set the entity table if the option has been specified
        if (isset($entityTable)) {
            $this->setEntityTable($entityTable);
        }
        // check if the entity table has been set
        if (!isset($this->_entityTable)) {
            throw new \InvalidArgumentException('The entity table has been not set yet.');
        }
    }

    /**
     * Get the database adapter
     */
    public function getAdapter()
    {
        return $this->_adapter;
    }

    /**
     * Set the entity table
     */
    public function setEntityTable($entityTable)
    {
        if (!is_string($table) || empty($entityTable)) {
            throw new \InvalidArgumentException('The entity table is invalid.');
        }
        $this->_entityTable = $entityTable;
    }
      
    /**
     * Get the entity table
     */
    public function getEntityTable()
    {
        return $this->_entityTable;
    }
        
    /**
     * Find an entity by its ID
     */
    public function findById($id)
    {
        $this->_adapter->select($this->_entityTable, "id = $id");
        if ($data = $this->_adapter->fetch()) {
            return $this->_createEntity($data);
        }
        return null;
    }

    /**
     * Find all the entities that match the specified criteria (or all when no criteria are given)
     */
    public function find($criteria = '')
    {
        $collection = new \D\Collection\EntityCollection;
        $this->_adapter->select($this->_entityTable, $criteria);
        while ($data = $this->_adapter->fetch()) {
            $collection[] = $this->_createEntity($data);
        }
        return $collection;
    }
    
    /**
     * Reconstitute the corresponding entity with the supplied data
     * (implementation delegated to child mappers)
     */
    abstract protected function _createEntity(array $fields);   
}

