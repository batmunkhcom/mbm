<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M\Database\Model\Mapper;
use M\Database\Library\Database,
    M\Database\Model,
    M\Database\Common;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class EntryMapper extends AbstractMapper
{
    protected $_commentMapper; 
    protected $_entityTable = 'entries';
    
    /**
     * Constructor
     */
    public function __construct(Database\Library\Database\DatabaseAdapterInterface $adapter, CommentMapper $commentMapper)
    {
        $this->_commentMapper = $commentMapper;
        parent::__construct($adapter);
    }
    
    /**
     * Get the comment mapper
     */
    public function getCommentMapper()
    {
        return $this->_commentMapper;     
    }
      
    /**
     * Insert a new entry
     */
    public function insert(ModelEntry $entry)
    {
        return $this->_adapter->insert($this->_entityTable, $entry->toArray());
    }
    
    /**
     * Delete an existing entry (the related comments are deleted also)
     */
    public function delete($id)
    {
        if ($id instanceof ModelEntry) {
            $id = $id->id;
        }
        $this->_adapter->delete($this->_entityTable, "id = $id");
        return $this->_commentMapper->delete($id, $col = 'entry_id');
    }
        
    /**
     * Create an entry entity with the supplied data 
     * (the 'comments' field is filled with a collection proxy for lazy-loading comments)
     */
    protected function _createEntity(array $fields)
    {
        return new ModelEntry(array(
            'id'       => $fields['id'],
            'title'    => $fields['title'],
            'content'  => $fields['content'],
            'author'   => $fields['author'],
            'comments' => new Common\CollectionProxy($this->_commentMapper, "entry_id = {$fields['id']}")
        ));
    }     
}