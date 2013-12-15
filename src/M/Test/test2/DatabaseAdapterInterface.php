<?php

namespace M\Test;

interface DatabaseAdapterInterface
{
    public function connect();
    
    public function disconnect();  
    
    public function query($query);
    
    public function fetch();  
    
    public function select($table, $where, $fields, $order, $limit, $offset);
    
    public function insert($table, array $data);
    
    public function update($table, array $data, $where);
    
    public function delete($table, $where);
    
    public function getInsertId();
    
    public function countRows();
    
    public function getAffectedRows();
}