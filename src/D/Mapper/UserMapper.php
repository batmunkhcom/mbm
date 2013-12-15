<?php


namespace D\Mapper;

class UserMapper extends \D\AbstractMapper {

    
    protected $_entityTable = 'users';
    
    /**
     * Insert a new comment
     */
    public function insert(\D\Model\User $user)
    {
        return $this->_adapter->insert($this->_entityTable, $user->toArray());
    }
    
    /**
     * Delete an existing comment
     */
    public function delete($id, $col = 'id')
    {
        if ($id instanceof \D\Model\User) {
            $id = $id->id;
        }
        return $this->_adapter->delete($this->_entityTable, "$col = $id");
    }
     
    /**
     * Create a comment entity with the supplied data
     */
    protected function _createEntity(array $fields)
    {
        return new \D\Model\User(array(
            'id'       => $fields['id'],
            'name'  => $fields['name'],
            'email'   => $fields['email'],
            'role'   => $fields['role']
        ));
    }    

}
