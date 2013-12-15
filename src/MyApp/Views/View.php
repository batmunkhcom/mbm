<?php
/**
 * This file is part of the miniCMS package.
 * (c) 2005-2012 BATMUNKH Moltov <contact@batmunkh.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MyApp\Views;

/**
 * Description here
 *
 * @package    miniCMS
 * @subpackage -
 * @author     BATMUNKH Moltov <contact@batmunkh.com>
 * @version    SVN: $Id 
 */
class View
{
    protected $_values = array();
    protected $_templateDirectory = 'Templates';
    protected $_templateFile = 'default_template.php';

    /**
     * Constructor
     */
    public function __construct(array $templateOptions = array())
    {
        // Set the view template directory
        if (isset($templateOptions['templateDirectory'])) {
            $this->setTemplateDirectory($templateOptions['templateDirectory']);
        }
        // Set the view template file
        if (isset($templateOptions['templateFile'])) {
            $this->setTemplateFile($templateOptions['templateFile']);
        }
    }

    /**
     * Set the view template directory
     */ 
    public function setTemplateDirectory($templateDirectory) 
    {
        if (!is_dir($templateDirectory)) {
            throw new \InvalidArgumentException("The template directory '$templateDirectory' is invalid.");
        }
        $this->_templateDirectory = $templateDirectory;    
    }

    /**
     * Get the template directory
     */
    public function getTemplateDirectory()
    {
        return $this->_templateDirectory;
    }
      
    /**
     * Set the view template file 
     */
    public function setTemplateFile($templateFile) 
    {
        $templateFile = $this->_templateDirectory . DIRECTORY_SEPARATOR . $templateFile;
        if (!file_exists($templateFile) || !is_readable($templateFile)) {
            throw new \InvalidArgumentException("The template file '$templateFile' is invalid."); 
        }
        $this->_templateFile = $templateFile;
    }
      
    /**
     * Get the view template file
     */
    public function getTemplateFile()
    {
        return $this->_templateFile;
    }

    /**
     * Assign a value to the specified field of the view via the corresponding mutator (if it exists);
     * otherwise, assign the value directly to the '$_values' protected array
     */
    public function __set($name, $value)
    {
        $mutator = 'set' . ucfirst(strtolower($name));
        if (method_exists($this, $mutator) && is_callable(array($this, $mutator))) {
            $this->$mutator($value);
        }
        else {
            $this->_values[$name] = $value;
        }
    }

    /**
     * Get the value assigned to the specified field of the view via the corresponding getter (if it exists);
     * otherwise, get the value directly from the '$_values' protected array
     */
    public function __get($name)
    {
        $accessor = 'get' . ucfirst(strtolower($name));
        if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            return $this->$accessor;
        }
        if (isset($this->_values[$name])) {
            return $this->_values[$name];
        }
        throw new \InvalidArgumentException("The field '$name' has not been set for this view yet.");
    }

    /**
     * Check if the specified field has been assigned to the view
     */
    public function __isset($name)
    {
        return isset($this->_values[$name]);
    }

    /**
     * Unset the specified field from the view
     */
    public function __unset($name)
    {
        if (isset($this->_values[$name])) {
            unset($this->_values[$name]);
            return true;
        }
        throw new \InvalidArgumentException("The field '$name' has not been set for this view yet.");
    }

    /**
     * Render the template
     */
    public function render()
    {
        extract($this->_values);
        ob_start();
        include $this->_templateFile;
        return ob_get_clean();
    }

    /**
     * Get an associative array with the values assigned to the fields of the view
     */
    public function toArray()
    {
        return $this->_values;
    }
}

