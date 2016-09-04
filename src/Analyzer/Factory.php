<?php
/**
 * @author Patsura Dmitry https://github.com/ovr <talk@dmtry.me>
 */

namespace PHPSA\Analyzer;

use PHPSA\Analyzer;
use Webiny\Component\EventManager\EventManager;
use PHPSA\Analyzer\Pass as AnalyzerPass;

class Factory
{
    /**
     * @param EventManager $eventManager
     * @return Analyzer
     */
    public static function factory(EventManager $eventManager)
    {
        $analyzer = new Analyzer($eventManager);
        $analyzer->registerExpressionPasses(
            [
                // Another
                new AnalyzerPass\Expression\ErrorSuppression(),
                // Arrays
                new AnalyzerPass\Expression\ArrayShortDefinition(),
                new AnalyzerPass\Expression\ArrayDuplicateKeys(),
                // Function call
                new AnalyzerPass\Expression\FunctionCall\AliasCheck(),
                new AnalyzerPass\Expression\FunctionCall\DebugCode(),
                new AnalyzerPass\Expression\FunctionCall\RandomApiMigration(),
                new AnalyzerPass\Expression\FunctionCall\UseCast(),
                new AnalyzerPass\Expression\FunctionCall\DeprecatedIniOptions(),
                new AnalyzerPass\Expression\FunctionCall\RegularExpressions(),
                new AnalyzerPass\Expression\FunctionCall\ArgumentUnpacking(),
                new AnalyzerPass\Expression\FunctionCall\DeprecatedFunctions(),
            ]
        );
        $analyzer->registerStatementPasses(
            [
                new AnalyzerPass\Statement\MethodCannotReturn(),
                new AnalyzerPass\Statement\UnexpectedUseOfThis(),
            ]
        );
        $analyzer->bind();

        return $analyzer;
    }
}
