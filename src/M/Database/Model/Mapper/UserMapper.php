<?php


namespace M\Database\Model\Mapper;

class UserMapper extends \M\Database\AbstractMapper {

    
    protected $_entityTable = 'users';
    
    /**
     * Insert a new comment
     */
    public function insert(\M\Database\Model\User $user)
    {
        return $this->_adapter->insert($this->_entityTable, $user->toArray());
    }
    
    /**
     * Delete an existing comment
     */
    public function delete($id, $col = 'id')
    {
        if ($id instanceof \M\Database\Model\User) {
            $id = $id->id;
        }
        return $this->_adapter->delete($this->_entityTable, "$col = $id");
    }
     
    /**
     * Create a comment entity with the supplied data
     */
    protected function _createEntity(array $fields)
    {
        return new \M\Database\Model\User(array(
            'id'       => $fields['id'],
            'name'  => $fields['name'],
            'email'   => $fields['email'],
            'role'   => $fields['role']
        ));
    }    

}
