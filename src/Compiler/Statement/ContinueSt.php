<?php

namespace PHPSA\Compiler\Statement;

use PHPSA\CompiledExpression;
use PHPSA\Context;

class ContinueSt extends AbstractCompiler
{
    protected $name = '\PhpParser\Node\Stmt\Continue_';

    /**
     * @param \PhpParser\Node\Stmt\Continue_ $stmt
     * @param Context $context
     * @return CompiledExpression
     */
    public function compile($stmt, Context $context)
    {
        $compiler = $context->getExpressionCompiler();

        if ($stmt->num !== null) {
            $compiler->compile($stmt->num);
        }
    }
}
