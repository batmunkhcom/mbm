<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MyApp\Service;
use MyApp\Model\Mapper,
    MyApp\Model;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class EntryService extends AbstractService
{
    /**
     * Constructor
     */
    public function __construct(\MyApp\Model\Mapper\EntryMapper $entryMapper)
    {
        parent::__construct($entryMapper);
    }
}