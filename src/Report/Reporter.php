<?php

namespace PHPSA\Report;

use PHPSA\IssuesCollector;

interface Reporter
{
    /**
     * @param IssuesCollector $issuesCollector
     *
     * @return string The formatted issues.
     */
    public function report(IssuesCollector $issuesCollector);
}
