<?php
/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MyApp\Service;
use MyApp\Model\Mapper,
    MyApp\Model;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
abstract class AbstractService
{
    protected $_mapper;

    /**
     * Constructor
     */
    public function __construct(\MyApp\Model\Mapper\AbstractMapper $mapper)
    {
        $this->_mapper = $mapper;
    }

    /**
     * Find an entity by its ID
     */
    public function findById($id)
    {
        return $this->_mapper->findById($id);
    }

    /**
     * Find the entities that meet the specified conditions 
     * (find all entities if no conditions are specified)
     */
    public function find($conditions = '')
    {
        return $this->_mapper->find($conditions);
    }

    /**
     * Insert a new entity
     */
    protected function insert($entity)
    {
        return $this->_mapper->insert($entity);
    }

    /**
     * Update an existing entity
     */
    public function update($entity)
    {
        return $this->_mapper->update($entity);
    }

    /**
     * Delete one or more entities
     */
    public function delete($id)
    {
        return $this->_mapper->delete($id);
    }
}

