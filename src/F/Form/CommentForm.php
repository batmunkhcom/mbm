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
class CommentForm extends \F\Form {

    public $form;

    public function __construct($name = 'comment', $configure = array()) {

        $form = new \F\Form($name, $configure);

        $form->addElement(__('Name'), 'name', 'input', array(
            'class' => 'form-control',
            'value' => post('name'),
            'minlength' => 2,
            'required' => 'true'
                ), array(
            'minlength' => 2
        ));
        $form->addElement(__('Comment'), 'comment', 'input', array(
            'class' => 'form-control',
            'value' => post('comment')
                ), array(
            'is_required' => 1,
            'minlength' => 2
        ));
        $form->addElement('', 'send_comment', 'button', array(
            'class' => 'btn btn-success',
            'type' => 'submit',
            'value' => __('Send')
        ));


        $this->form = $form;
        return $form;
    }

}
