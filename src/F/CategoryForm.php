<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id
 */
class CategoryForm {

    public $form;

    public function __construct() {

        $form = \F\Nibble\NibbleForm::getInstance('Category');
        $form->addField('choice', 'select', array(
            'choices' => array(
                0 => __('Set as main category'),
                1 => 'uur songolt n'
            ),
            'false_values' => array(0)
        ));
        $form->addField('choice', 'radio', array(
            'choices' => array(
                'inactive' => __('Inactive'),
                'active' => __('Active'),
                'pending' => __('Pending')
            ),
            'label' => __('Status')
        ));
        $form->addField('title', 'text', array(
            'class' => 'input',
            'required' => true
        ));

        $this->form = $form;

        return $this;
    }

}
