<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M\Database;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
abstract class AbstractEntity {

    protected $_values = array();
    protected $_allowedFields = array();

    /**
     * Constructor
     */
    public function __construct() {
        if (!isset($fields)) {
            
        } else {
            foreach ($fields as $name => $value) {
                echo $name.'--'.$v.'...';
                $this->$name = $value;
            }
            die();
        }
    }

    /**
     * Assign a value to the specified field via the corresponding mutator (if it exists); 
     * otherwise, assign the value directly to the '$_values' array 
     */
    public function __set($name, $value) {
        
        if (!in_array($name, $this->_allowedFields)) {
            throw new \InvalidArgumentException("Setting the field '$name' is not allowed for this entity.");
        }
        $mutator = 'set' . ucfirst($name);
        if (method_exists($this, $mutator) && is_callable(array($this, $mutator))) {
            $this->$mutator($value);
        } else {
            $this->_values[$name] = $value;
        }
    }

    /**
     * Get the value of the specified field (via the getter if it exists or by getting it from the $_values array)
     */
    public function __get($name) {
        if (!in_array($name, $this->_allowedFields)) {
            throw new InvalidArgumentException("Getting the field '$name' is not allowed for this entity.");
        }
        $accessor = 'get' . ucfirst($name);
        if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            return $this->$accessor;
        }
        if (isset($this->_values[$name])) {
            return $this->_values[$name];
        }
        throw new InvalidArgumentException("The field '$name' has not been set for this entity yet.");
    }

    /**
     * Check if the specified field has been assigned to the entity
     */
    public function __isset($name) {
        if (!in_array($name, $this->_allowedFields)) {
            throw new InvalidArgumentException("The field '$name' is not allowed for this entity.");
        }
        return isset($this->_values[$name]);
    }

    /**
     * Unset the specified field from the entity
     */
    public function __unset($name) {
        if (!in_array($name, $this->_allowedFields)) {
            throw new InvalidArgumentException("Unsetting the field '$name' is not allowed for this entity.");
        }
        if (isset($this->_values[$name])) {
            unset($this->_values[$name]);
            return true;
        }
        throw new InvalidArgumentException("The field '$name' has not been set for this entity yet.");
    }

    /**
     * Get an associative array with the values assigned to the fields of the entity
     */
    public function toArray() {
        return $this->_values;
    }

}
