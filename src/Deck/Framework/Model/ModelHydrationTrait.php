<?php

namespace Deck\Framework\Model;

/**
 * The short description
 *
 * As many lines of extendend description as you want {@link element}
 * links to an element
 * {@link http://www.example.com Example hyperlink inline link} links to
 * a website. The inline
 *
 * @package package name
 * @author  Pedro Koblitz
 */
trait ModelHydrationTrait
{

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function hasUnderScore($string)
    {
          
        if (!is_string($string)) {
             throw new \InvalidArgumentException('$string must be a string');
        }

        if (str_pos($string, '_')) {
            return true;
        }

        return false;
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function isForeignKey($string)
    {

        if (!is_string($string)) {
             throw new \InvalidArgumentException('$string must be a string');
        }

        return str_pos($string, '_id');
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function getModelData($modelName, $id)
    {
          
        if (!is_string($modelName) && !intval($id)) {
             throw new \InvalidArgumentException('$modelName must be a string and $id must be an integer');
        }

        $methodName = 'get' . $modelName;

        if (!method_exists($this, $methodName)) {
            throw new BadMethodCallException("Impossible to hydrate. Getter method isn't set.");
        }

        return $this->$methodName($id);
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function buildMethodName($field)
    {
        if (!is_string($field)) {
             throw new \InvalidArgumentException('$field must be a string');
        }

        $methodName = 'set';

        if ($this->hasUnderScore($field)) {
            $names = array_filter(explode('_', $field));

            foreach ($names as $name) {
                $methodName .= ucfirst($name);
            }
        } else {
            $methodName .= ucfirst($field);
        }

        return $methodName;
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    public function hydrate(array $result, $name = null)
    {

        if (!is_string($name)) {
             throw new \InvalidArgumentException('$name must be a string');
        }

        $modelName = self::APP_MODEL_NAMESPACE;

        if (!$name) {
            $modelName .= $this->modelName;
            
        } else {
            $modelName .= $name;
        }

        if (!class_exists($modelName)) {
            throw new BadMethodCallException("Impossible to hydrate. Model class does not exist.");
        }

        $model = new $modelName();

        foreach ($this->fields as $field) {
            if (isset($result[$field])) {
                if ($this->isForeignKey($field)) {
                    $table = implode('_', array_pop(explode('_', $field)));
                    $fkResult = $this->getModelData($table, $result[$field]);

                    /* RECURSION */
                    $fkModel = $this->hydrate($fkResult, $table);
                    $methodName = $this->buildMethodName($table);
                    $this->methodNameErrorHandler($model, $methodName);
                    $model->$methodName($fkModel);
                    
                } elseif ($this->hasUnderScore($field)) {
                    $methodName = $this->buildMethodName($field);

                    $this->methodNameErrorHandler($model, $methodName);

                    $model->$methodName($result[$field]);
                    
                } else {
                    $methodName = self::APP_SETTER_PREFIX . ucfirst($field);

                    $this->methodNameErrorHandler($model, $methodName);

                    $model->$methodName($result[$field]);
                }
            }
        }

        return $model;
    }

    /**
     * The short description
     *
     * @access public
     * @param  type [ $varname] description
     * @return type description
     */
    protected function methodNameErrorHandler(ModelInterface $model, $name)
    {

        if (!is_string($name)) {
             throw new \InvalidArgumentException('$name must be a string');
        }


        if (!method_exists($model, $name)) {
            throw new Exception("Impossible to hydrate. Model $modelName does not implement $methodName.");
        }
        
        return true;
    }
}
