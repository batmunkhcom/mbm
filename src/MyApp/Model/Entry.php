<?php
/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MyApp\Model;
use MyApp\Common;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class Entry extends AbstractEntity
{   
    protected $_allowedFields = array('id', 'title', 'content', 'author', 'comments');
    
    /**
     * Set the entry ID
     */
    public function setId($id)
    {
        if (!filter_var($id, FILTER_VALIDATE_INT, array('options' => array('min_range' => 1, 'max_range' => 999999)))) {
            throw new InvalidArgumentException('The entry ID is invalid.');
        }
        $this->_values['id'] = $id;
    }
    
    /**
     * Set the title of the entry
     */  
    public function setTitle($title)
    {
        if (!is_string($title) || strlen($title) < 2 || strlen($title) > 64) {
            throw new InvalidArgumentException('The title of the entry is invalid.');
        }
        $this->_values['title'] = $title;
    }
    
    /**
     * Set the content of the entry
     */ 
    public function setContent($content)
    {
        if (!is_string($content) || strlen($content) < 2) {
            throw new InvalidArgumentException('The entry is invalid.');
        }
        $this->_values['content'] = $content;
    }
    
    /**
     * Set the author of the entry
     */ 
    public function setAuthor($author)
    {
        if (!is_string($author) || strlen($author) < 2 || strlen($author) > 64) {
            throw new InvalidArgumentException('The author of the entry is invalid.');
        }
        $this->_values['author'] = $author;
    }
    
    /**
     * Set the comments of the entry (assigns a collection proxy for lazy-loading comments)
     */ 
    public function setComments(CommonCollectionProxy $comments)
    {
        $this->_values['comments'] = $comments;
    }                                                                          
}