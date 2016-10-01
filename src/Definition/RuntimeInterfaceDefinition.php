<?php
/**
 * @author Kévin Gomez https://github.com/K-Phoen <contact@kevingomez.fr>
 */

namespace PHPSA\Definition;

use PHPSA\Context;
use PHPSA\Exception\NotImplementedException;
use ReflectionClass;

class RuntimeInterfaceDefinition extends InterfaceDefinition
{
    /**
     * @var ReflectionClass
     */
    protected $reflection;

    /**
     * @param ReflectionClass $reflection
     */
    public function __construct(ReflectionClass $reflection)
    {
        parent::__construct($reflection->getName());

        $this->reflection = $reflection;
    }

    /**
     * @param Context $context
     * @return $this
     */
    public function compile(Context $context)
    {
        return $this;
    }

    /**
     * @param string $name
     * @param boolean|false $inherit
     * @return bool
     */
    public function hasMethod($name, $inherit = false)
    {
        return $this->reflection->hasMethod($name);
    }

    /**
     * @param string $name
     * @param bool $inherit
     * @return bool
     */
    public function hasConst($name, $inherit = false)
    {
        if (!$this->reflection->hasConstant($name)) {
            return false;
        }

        // NOTE: ReflectionClass::hasConstant also checks parent classes, so if $inherit is true, the job is already done.
        if ($inherit) {
            return true;
        }

        // but if it's not, we need to make sure that the constant is defined only in the current class. It means that
        // we have to check that it has no parent or that the parent does not define the constant.
        $parent = $this->reflection->getParentClass();
        if (!$parent) {
            return true;
        }

        return !$parent->hasConstant($name);
    }

    /**
     * @param $name
     * @param boolean|false $inherit
     * @return ReflectionClassMethod
     */
    public function getMethod($name, $inherit = false)
    {
        return new ReflectionClassMethod($this->reflection->getMethod($name));
    }

    /**
     * @param $name
     * @param bool $inherit
     * @return bool
     */
    public function hasProperty($name, $inherit = false)
    {
        return $this->reflection->hasProperty($name);
    }

    /**
     * @return string
     */
    public function getFilepath()
    {
        throw new NotImplementedException(__FUNCTION__);
    }

    /**
     * @return bool
     */
    public function isAbstract()
    {
        throw new NotImplementedException(__FUNCTION__);
    }
}
