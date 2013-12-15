<?php


namespace M\Test;

class UserMapper extends AbstractMapper {

    protected $_userMapper;
    protected $_entityTable = 'users';
    protected $_entityClass = 'M\Test\User';

    /**
     * Constructor
     */
    public function __construct(DatabaseInterface $adapter) {
        parent::__construct($adapter);
    }

    /**
     * Get the comment mapper
     */
    public function getUserMapper() {
        return $this->_userMapper;
    }

    /**
     * Delete an entry from the storage (deletes the related comments also)
     */
    public function delete($id, $col = 'id') {
        parent::delete($id);
        return $this->_userMapper->delete($id, 'entry_id');
    }

    /**
     * Create an entry entity with the supplied data
     * (assigns a collection proxy to the 'users' field for lazy-loading comments)
     */
    protected function _createEntity(array $data) {
        $entry = new $this->_entityClass(array(
            'id' => $data['id'],
            'title' => $data['title'],
            'content' => $data['content'],
            'comments' => new Proxy\CollectionProxy($this->_userMapper, "entry_id = {$data['id']}")
        ));
        return $entry;
    }

}
