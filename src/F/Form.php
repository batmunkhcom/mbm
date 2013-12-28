<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace F;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id
 */
abstract class Form {

    protected $_formName = '';
    protected $_formAttributes = '';
    protected $_formElements = array();
    protected $_formValues = array();

    public function __construct($formName, $formAttributes) {
        $this->_formName = $formName;
        $this->_formAttributes = $formAttributes;
    }

    public function getAttribute() {

    }

    public function setAttribute() {

    }

    public function save() {

    }

}
