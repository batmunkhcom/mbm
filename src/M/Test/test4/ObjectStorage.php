<?php


namespace M\Test;

class ObjectStorage extends SplObjectStorage implements ObjectStorageInterface
{
    public function clear() {
        $tempStorage = clone $this;
        $this->addAll($tempStorage);
        $this->removeAll($tempStorage);
        $tempStorage = null;
    } 
}