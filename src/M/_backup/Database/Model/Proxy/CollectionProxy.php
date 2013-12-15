<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M\Database\Model\Proxy;
use M\Database\Model\Collection;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class CollectionProxy extends AbstractProxy implements ProxyInterface, \Countable, \IteratorAggregate
{
    protected $_collection;

    /**
     * Load the entity collection via the mapper's 'find()' method
     */
    public function load()
    {
        if ($this->_collection === null) {
            $this->_collection = $this->_mapper->find($this->_params);
            if (!$this->_collection instanceof Collection\EntityCollection) {
                throw new \RuntimeException('Unable to load the related collection.');
            }
        }
        return $this->_collection;
    }

    /**
     * Count the number of elements in the collection
     */
    public function count()
    {
        return count($this->load());
    }

    /**
     * Load the entity collection when the proxy is used in a 'foreach' construct
     */
    public function getIterator()
    {
        return $this->load();
    }
}

