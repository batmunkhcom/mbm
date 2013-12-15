<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M\Database\Model\Proxy;
use M\Database\Model\Mapper;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
abstract class AbstractProxy
{
    protected $_mapper;
    protected $_params;

    /**
     * Constructor
     */
    public function __construct(Mapper\AbstractMapper $mapper, $params)
    {
        if (!is_string($params) || empty($params)) {
            throw new \InvalidArgumentException('The mapper parameters are invalid.');
        }
        $this->_mapper = $mapper;
        $this->_params = $params;
    }

    /**
     * Get the mapper
     */
    public function getMapper()
    {
        return $this->_mapper;
    }

    /**
     * Get the mapper parameters
     */
    public function getParams()
    {
        return $this->_params;
    }
}

