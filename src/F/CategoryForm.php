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
class CategoryForm {

    public $form;

    public function __construct() {

        $form = new PFBC\Form("validation");
        $form->configure(
                array(
                    'action' => '/?adfas'
                )
        );
        $form->addElement(new \F\PFBC\Element\HTML('<legend>' . __('Add new category') . '</legend>'));
        $form->addElement(new \F\PFBC\Element\Textbox(__('Title') . ":", "title", array(
            "required" => 1,
            "longDesc" => __('Title is required')
        )));

        $this->form = $form;

        return $form;
    }

}
