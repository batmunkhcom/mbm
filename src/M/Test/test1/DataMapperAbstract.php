<?php

namespace M\Test;

abstract class DataMapperAbstract
{
    protected $_db = NULL;
    protected $_table = '';
    protected $_identityMap = array();
   
    public function __construct(MySQLAdapter $db)
    {
        $this->_db = $db;   
    }
   
    // get domain object by ID (implemented by concrete domain object subclasses)
    abstract public function find($id);
   
    // insert/update domain object (implemented by concrete domain object subclasses)
    abstract public function save(DomainObjectAbstract $domainObject);
   
    // delete domain object (implemented by concrete domain object subclasses)
    abstract public function delete(DomainObjectAbstract $domainObject);
}
