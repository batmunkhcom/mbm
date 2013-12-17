<?php

/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace M;

/**
 * http://fuelyourcoding.com/roll-your-own-php-framework-part-ii/
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class Template {

    // template file ruu damjuulah huvisagchuudiig $page_vars -d hadgalna
    private $page_vars = array();
    
    // ali template file iig duudahiig $template_file -d zaaj ugnu 
    private $template_file;

    // When a new Template object is instantiated we want to make sure
    // we pass it a shortened path to the file we want it to use
    // as our template.
    // example: $template_file = new Template("helloworld/templates/helloworld.php");

    public function __construct($template_file) {


        // Let's build and set our class var $template_file to the
        // value of $template_file that was passed into our __construct method
        $this->template_file = $template_file;
    }

    // Now we create out set method to allow use to set variables that
    // we want in the template.
    // So in our page action we would do:
    // $template_file->set("title", "hello world");
    // and in our template:
    // <h1><?php echo $title; ? ></h1>
    public function set($var, $val) {
        // This may look weird, but it's not to bad;
        // what we are doing is setting the index name
        // of our associative array pageVars
        // (we setup earlier at the top of the class)
        // to the value that we pass. so $page_vars["yourVar"] = "yourValue"
        // is basically what it's doing.
        $this->page_vars[$var] = $val;
    }

    // To render we will need to do a couple of things.
    // First we will need to extract those pageVars then
    // include the template, populate the values in the template
    // and return a rendered page to the browser
    //
    // This is far more easy than you think it is
    // trust me!
    public function render() {
        // The extract function is a weird bird
        // when you call it on an associative array
        // it creates regular vars.
        // For instance:
        //      $this->page_vars["yourVar"]
        // becomes:
        //      $yourVar
        // so basically we are converting all the
        // index keys (with their values), in page_vars to
        // their own respected variables
        extract($this->page_vars);

        // Now that we have all the variables extracted, the vars we set
        // in the template will be replaced by the value of the pageVars variables.
        // Now we start up our output buffer, grab our template and return the
        // buffer with it's "rendered" template
        ob_start();
        require($this->template_file);
        return ob_get_clean();
    }

}
