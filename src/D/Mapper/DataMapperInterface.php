<?php
namespace D\Mapper;
//use ModelEntityInterface;
 
interface DataMapperInterface
{
    public function fetchById($id);
    public function fetchAll(array $conditions = array());
    public function insert(\D\Model\EntityInterface $entity);
    public function update(\D\Model\EntityInterface $entity);
    public function save(\D\Model\EntityInterface $entity);
    public function delete(\D\Model\EntityInterface $entity);
}