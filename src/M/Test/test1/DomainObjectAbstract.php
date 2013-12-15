<?php

namespace M\Test;

abstract class DomainObjectAbstract
{
    protected $_data = array();
   
    public function __construct(array $data = NULL)
    {
        if ($data !== NULL)
        {
            // populate domain object with an array of data
            foreach ($data as $property => $value)
            {
                if (!empty($property))
                {
                   $this->$property = $value;
                }
            }
        }
    }
   
    // set domain object property
    public function __set($property, $value)
    {
        if (!array_key_exists($property, $this->_data))
        {
            throw new ModelObjectException('The specified property is not valid for this domain object.'); 
        }
        if (strtolower($property) === 'id' AND $this->_data['id'] !== NULL)
        {
            throw new DomainObjectException('ID for this domain object is immutable.');
        }
        $this->_data[$property] = $value;
    }
   
    // get domain object property
    public function __get($property)
    {
        if (!array_key_exists($property, $this->_data))
        {
            throw new DomainObjectException('The property requested is not valid for this domain object.');
        }
        return $this->_data[$property];
    } 
   
    // check if given domain object property has been set
    public function __isset($property)
    {
        return isset($this->_data[$property]);
    }
   
    // unset domain object property
    public function __unset($property)
    {
        if (isset($this->_data[$property]))
        {
            unset($this->_data[$property]);
        }
    }
}
