<?php
/**
 * @author Kévin Gomez https://github.com/K-Phoen <contact@kevingomez.fr>
 */

namespace PHPSA\Definition;

use PHPSA\CompiledExpression;
use PHPSA\Context;
use PhpParser\Node;
use PHPSA\Variable;
use PHPSA\Compiler\Event;

class InterfaceDefinition extends ParentDefinition
{
    /**
     * Class methods
     *
     * @var ClassMethod[]
     */
    protected $methods = [];

    /**
     * Class constants
     *
     * @var Node\Stmt\Const_[]
     */
    protected $constants = [];

    /**
     * @todo Use Finder
     *
     * @var string
     */
    protected $filepath;

    /**
     * @var Node\Stmt\Interface_|null
     */
    protected $statement;

    /**
     * @var string[]
     */
    protected $extendsInterfaces = [];

    /**
     * @var InterfaceDefinition[]
     */
    protected $extendsInterfacesDefinitions;

    /**
     * @param string $name
     * @param Node\Stmt\Interface_ $statement
     */
    public function __construct($name, Node\Stmt\Interface_ $statement = null)
    {
        $this->name = $name;
        $this->statement = $statement;
    }

    /**
     * @param ClassMethod $methodDefintion
     */
    public function addMethod(ClassMethod $methodDefintion)
    {
        $this->methods[$methodDefintion->getName()] = $methodDefintion;
    }

    /**
     * @param Node\Stmt\ClassConst $const
     */
    public function addConst(Node\Stmt\ClassConst $const)
    {
        $this->constants[$const->consts[0]->name] = $const;
    }

    /**
     * @param Context $context
     * @return $this
     */
    public function compile(Context $context)
    {
        if ($this->compiled) {
            return $this;
        }

        $context->getEventManager()->fire(
            Event\StatementBeforeCompile::EVENT_NAME,
            new Event\StatementBeforeCompile($this->statement, $context)
        );

        $this->compiled = true;
        $context->setFilepath($this->filepath);
        $context->setScope($this);

        // Compile event for constants
        foreach ($this->constants as $const) {
            $context->getEventManager()->fire(
                Event\StatementBeforeCompile::EVENT_NAME,
                new Event\StatementBeforeCompile($const, $context)
            );
        }

        // Compile each method
        foreach ($this->methods as $method) {
            $context->clearSymbols();

            if (!$method->isStatic()) {
                $thisPtr = new Variable('this', $this, CompiledExpression::OBJECT);
                $thisPtr->incGets();
                $context->addVariable($thisPtr);
            }

            $method->compile($context);
        }

        return $this;
    }

    /**
     * @return bool
     */
    public function isAbstract()
    {
        return true;
    }

    /**
     * @param string $name
     * @param boolean|false $inherit
     * @return bool
     */
    public function hasMethod($name, $inherit = false)
    {
        if (isset($this->methods[$name])) {
            return true;
        }

        if (!$inherit) {
            return false;
        }

        /** @var InterfaceDefinition $interfacesDefinition */
        foreach ($this->extendsInterfacesDefinitions as $interfacesDefinition) {
            if ($interfacesDefinition->hasMethod($name, true)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $name
     * @param bool $inherit
     * @return bool
     */
    public function hasConst($name, $inherit = false)
    {
        if (isset($this->constants[$name])) {
            return true;
        }

        if ($inherit) {
            foreach ($this->extendsInterfacesDefinitions as $interface) {
                if ($interface->hasConst($name, true)) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param string $name
     * @param boolean|false $inherit
     * @return ClassMethod|null
     */
    public function getMethod($name, $inherit = false)
    {
        if (isset($this->methods[$name])) {
            return $this->methods[$name];
        }

        if ($inherit) {
            foreach ($this->extendsInterfacesDefinitions as $interface) {
                if ($method = $interface->getMethod($name, true)) {
                    return $method;
                }
            }
        }

        return null;
    }

    /**
     * @return string
     */
    public function getFilepath()
    {
        return $this->filepath;
    }

    /**
     * @param string $filepath
     */
    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;
    }

    /**
     * @return string[]
     */
    public function getExtendsInterface()
    {
        return $this->extendsInterfaces;
    }

    /**
     * @param string $interfaceName
     */
    public function addExtendsInterface($interfaceName)
    {
        $this->extendsInterfaces[] = $interfaceName;
    }

    /**
     * @param InterfaceDefinition $interfaceDefinition
     */
    public function addExtendsInterfaceDefinition(InterfaceDefinition $interfaceDefinition)
    {
        $this->extendsInterfacesDefinitions[$interfaceDefinition->getName()] = $interfaceDefinition;
    }
}
