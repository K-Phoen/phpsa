<?php

namespace PHPSA\Analyzer\Pass\Statement;

use PhpParser\Node\Stmt;
use PhpParser\Node;
use PhpParser\Node\Stmt\Goto_;
use PhpParser\Node\Stmt\Label;
use PHPSA\Analyzer\Helper\DefaultMetadataPassTrait;
use PHPSA\Analyzer\Pass;
use PHPSA\Context;

class GotoUsage implements Pass\AnalyzerPassInterface
{
    use DefaultMetadataPassTrait;

    /**
     * @param $stmt
     * @param Context $context
     * @return bool
     */
    public function pass($stmt, Context $context)
    {
        if ($stmt instanceof Label) {
            $context->notice(
                'goto_usage',
                'Do not use labels',
                $stmt
            );
            return true;
        } elseif ($stmt instanceof Goto_) {
            $context->notice(
                'goto_usage',
                'Do not use goto statements',
                $stmt
            );
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public function getRegister()
    {
        return [
            Goto_::class,
            Label::class,
        ];
    }
}
