<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M\DB\Model\Mapper;

use M\DB,
    M\DB\Model\Proxy;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */

class UsersMapper extends M\DB\Mapper\AbstractMapper {

    protected $_commentMapper;
    protected $_entityTable = 'users';
    protected $_entityClass = 'M\DB\Model\Users';

    /**
     * Constructor
     */
    public function __construct(M\DB $adapter) {
        parent::__construct($adapter);
    }

    /**
     * Get the comment mapper
     */
    public function getCommentMapper() {
        return $this->_commentMapper;
    }

    /**
     * Delete an entry from the storage (deletes the related comments also)
     */
    public function delete($id, $col = 'id') {
        parent::delete($id);
        return $this->_commentMapper->delete($id, 'entry_id');
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
            'comments' => new Proxy\CollectionProxy($this->_commentMapper, "entry_id = {$data['id']}")
        ));
        return $entry;
    }

}
