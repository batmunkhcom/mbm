<?php
namespace D\Model\Collection;
//use ModelEntityInterface;
 
interface EntityCollectionInterface extends \Countable, \ArrayAccess, \IteratorAggregate 
{
    public function add(\D\Model\EntityInterface $entity);
    public function remove(\D\Model\EntityInterface $entity);
    public function get($key);
    public function exists($key);
    public function clear();
    public function toArray();
}