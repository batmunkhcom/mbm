<?php

/**
 * This file is part of the miniCMS package.
 * (c) since 2005 BATMUNKH Moltov <contact@batmunkh.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace F\Form;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id
 */
class CommentForm extends \F\PFBC\Form {

    public $form;

    public function __construct($form_name = 'comment', $code = '') {

        $form = new \F\PFBC\Form($form_name);
        $form->configure(
                array(
                    'action' => get_url('form_comment_action')
                )
        );
        $form->addElement(new \F\PFBC\Element\HTML('<legend>' . __('Comment form') . '</legend>'));
        $form->addElement(new \F\PFBC\Element\Hidden("code", $code));
        $form->addElement(new \F\PFBC\Element\Hidden("form_name", $form_name));
        $form->addElement(new \F\PFBC\Element\Textbox(__('Name') . ":", "name", array(
            "required" => 1,
            "longDesc" => __('Name field is required')
        )));
        $form->addElement(new \F\PFBC\Element\Textarea(__('Comment'), 'comment', array(
            "labelToPlaceholder" => 1
        )));

        $form->addElement(new \F\PFBC\Element\Button(__("Send")));
        $form->addElement(new \F\PFBC\Element\Button(__('Reset'), "reset", array(
        )));

        $this->form = $form;

        return $this;
    }

}