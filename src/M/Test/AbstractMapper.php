<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M\Test;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */

abstract class AbstractMapper implements MapperInterface {

    protected $_adapter;
    protected $_entityTable;
    protected $_entityClass;

    /**
     * Constructor
     */
    public function __construct(DatabaseInterface $adapter, array $entityOptions = array()) {
        $this->_adapter = $adapter;
        // set the entity table is the option has been specified
        if (isset($entityOptions['entityTable'])) {
            $this->setEntityTable($entityOtions['entityTable']);
        }
        // set the entity class is the option has been specified
        if (isset($entityOptions['entityClass'])) {
            $this->setEntityClass($entityOtions['entityClass']);
        }
        // check the entity options
        $this->_checkEntityOptions();
    }

    /**
     * Check if the entity options have been set
     */
    protected function _checkEntityOptions() {
        if (!isset($this->_entityTable)) {
            throw new \RuntimeException('The entity table has not been set yet.');
        }
        if (!isset($this->_entityClass)) {
            throw new \RuntimeException('The entity class has been not set yet.');
        }
    }

    /**
     * Get the database adapter
     */
    public function getAdapter() {
        return $this->_adapter;
    }

    /**
     * Set the entity table
     */
    public function setEntityTable($entityTable) {
        if (!is_string($table) || empty($entityTable)) {
            throw new \InvalidArgumentException('The entity table is invalid.');
        }
        $this->_entityTable = $entityTable;
        return $this;
    }

    /**
     * Get the entity table
     */
    public function getEntityTable() {
        return $this->_entityTable;
    }

    /**
     * Set the entity class
     */
    public function setEntityClass($entityClass) {
        if (!is_subclass_of($entityClass, 'Blog\Model\AbstractEntity')) {
            throw new \InvalidArgumentException('The entity class is invalid.');
        }
        $this->_entityClass = $entityClass;
        return $this;
    }

    /**
     * Get the entity class
     */
    public function getEntityClass() {
        return $this->_entityClass;
    }

    /**
     * Find an entity by its ID
     */
    public function findById($id) {
        $this->_adapter->select($this->_entityTable, "id = $id");
        if ($data = $this->_adapter->fetch()) {
            return $this->_createEntity($data);
        }
        return null;
    }

    /**
     * Find entities according to the given criteria (all entities will be fetched if no criteria are specified)
     */
    public function find($conditions = '') {
        $collection = new Collection\EntityCollection;
        $this->_adapter->select($this->_entityTable, $conditions);
        while ($data = $this->_adapter->fetch()) {
            $collection[] = $this->_createEntity($data);
        }
        return $collection;
    }

    /**
     * Insert a new entity in the storage
     */
    public function insert($entity) {
        if (!$entity instanceof $this->_entityClass) {
            throw new \InvalidArgumentException('The entity to be inserted must be an instance of ' . $this->_entityClass . '.');
        }
        return $this->_adapter->insert($this->_entityTable, $entity->toArray());
    }

    /**
     * Update an existing entity in the storage
     */
    public function update($entity) {
        if (!$entity instanceof $this->_entityClass) {
            throw new \InvalidArgumentException('The entity to be updated must be an instance of ' . $this->_entityClass . '.');
        }
        $id = $entity->id;
        $data = $entity->toArray();
        unset($data['id']);
        return $this->_adapter->update($this->_entityTable, $data, "id = $id");
    }

    /**
     * Delete one or more entities from the storage
     */
    public function delete($id, $col = 'id') {
        if ($id instanceof $this->_entityClass) {
            $id = $id->id;
        }
        return $this->_adapter->delete($this->_entityTable, "$col = $id");
    }

    /**
     * Reconstitute an entity with the data retrieved from the storage (implementation delegated to concrete mappers)
     */
    abstract protected function _createEntity(array $data);
}