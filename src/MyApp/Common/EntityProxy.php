<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MyApp\Common;
use MyApp\Model;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class EntityProxy extends AbstractProxy implements LoadableInterface
{
    protected $_entity;
    
    /**
     * Load an entity via the 'findById()' method of the injected mapper
     */ 
    public function load()
    {
        if ($this->_entity === null) {
            $this->_entity = $this->_mapper->findById($this->_params);
            if (!$this->_entity instanceof Model\AbstractEntity) {
                throw new \RunTimeException('Unable to load the specified entity.');
            }
        }
        return $this->_entity;
    }   
}

