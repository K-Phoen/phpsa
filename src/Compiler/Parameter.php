<?php
/**
 * @author Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace PHPSA\Compiler;

use PhpParser\NodeAbstract;
use PHPSA\CompiledExpression;
use PHPSA\Variable;

class Parameter extends Variable
{
    /**
     * @param string $name
     * @param null $defaultValue
     * @param int $type
     * @param bool|false $referenced
     * @param NodeAbstract $declarationStmt
     */
    public function __construct($name, $defaultValue = null, $type = CompiledExpression::UNKNOWN, $referenced = false, NodeAbstract $declarationStmt)
    {
        parent::__construct($name, $defaultValue, $type, $declarationStmt);

        $this->referenced = $referenced;
    }

    /**
     * @return string
     */
    public function getSymbolType()
    {
        return 'parameter';
    }
}
