<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MyApp\Model;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class Comment extends AbstractEntity
{   
    protected $_allowedFields = array('id', 'content', 'author', 'entry_id');
    
    /**
     * Set the comment ID
     */
    public function setId($id)
    {
        if (!filter_var($id, FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 999999)))) {
            throw new InvalidArgumentException('The comment ID is invalid.');
        } 
        $this->_values['id'] = $id;        
    }
    
    /**
     * Set the comment content
     */ 
    public function setContent($content)
    {
        if (!is_string($content) || strlen($content) < 2) {
            throw new InvalidArgumentException('The comment is invalid.');
        }
        $this->_values['content'] = $content;
    }
    
    /**
     * Set the comment author
     */ 
    public function setAuthor($author)
    {
        if (!is_string($author) || strlen($author) < 2 || strlen($author) > 64) {
            throw new InvalidArgumentException('The author of the comment is invalid.');
        }
        $this->_values['author'] = $author;
    }                                                                     
}