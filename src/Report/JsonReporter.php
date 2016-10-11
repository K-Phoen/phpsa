<?php

namespace PHPSA\Report;

use PHPSA\Issue;
use PHPSA\IssuesCollector;

class JsonReporter implements Reporter
{
    protected $jsonOptions;

    public function __construct($jsonOptions = JSON_PRETTY_PRINT)
    {
        $this->jsonOptions = $jsonOptions;
    }

    /**
     * {@inheritdoc}
     */
    public function report(IssuesCollector $issuesCollector)
    {
        return json_encode(
            $this->issuesToArray($issuesCollector->getIssues()),
            $this->jsonOptions
        );
    }

    /**
     * @param Issue[] $issues
     * @return array
     */
    protected function issuesToArray(array $issues)
    {
        return array_map(function (Issue $issue) {
            return $issue->toArray();
        }, $issues);
    }
}
