<?php

namespace PHPSA\Report\Formatter;

use PHPSA\Issue;

interface ReportFormatter
{
    /**
     * @return string
     */
    public function reportBeginning();

    /**
     * @return string
     */
    public function reportEnd();

    /**
     * @param Issue $issue
     *
     * @return string The formatted issue.
     */
    public function formatIssue(Issue $issue);
}
