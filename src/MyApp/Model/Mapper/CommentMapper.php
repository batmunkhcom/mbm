<?php
/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MyAppModelMapper;
use MyAppLibraryDatabase,
    MyAppModel,
    MyAppCommon;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class CommentMapper extends AbstractMapper
{
    protected $_entityTable = 'comments';
    
    /**
     * Insert a new comment
     */
    public function insert(ModelComment $comment)
    {
        return $this->_adapter->insert($this->_entityTable, $comment->toArray());
    }
    
    /**
     * Delete an existing comment
     */
    public function delete($id, $col = 'id')
    {
        if ($id instanceof ModelComment) {
            $id = $id->id;
        }
        return $this->_adapter->delete($this->_entityTable, "$col = $id");
    }
     
    /**
     * Create a comment entity with the supplied data
     */
    protected function _createEntity(array $fields)
    {
        return new ModelComment(array(
            'id'       => $fields['id'],
            'content'  => $fields['content'],
            'author'   => $fields['author']
        ));
    }     
}