<?php


namespace M\Test;

interface DataMapperInterface
{
    public function fetchById($id);
    public function fetchAll(array $conditions = array());
    public function insert(EntityInterface $entity);
    public function update(EntityInterface $entity);
    public function save(EntityInterface $entity);
    public function delete(EntityInterface $entity);
}