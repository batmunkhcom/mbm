<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace MyApp\Model\Collection;
use MyApp\Model;


/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
interface CollectionInterface extends Countable, IteratorAggregate, ArrayAccess
{
    public function toArray();

    public function clear();

    public function reset();

    public function add($key, ModelAbstractEntity $entity);
    
    public function get($key);

    public function remove($key);

    public function exists($key);
}
