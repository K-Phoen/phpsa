<?php

namespace PHPSA\Report\Formatter;

use PHPSA\Issue;

class JsonFormatter implements ReportFormatter
{
    protected $isFirstIssue = true;

    /**
     * {@inheritdoc}
     */
    public function reportBeginning()
    {
        $this->isFirstIssue = true;
        return '[';
    }

    /**
     * {@inheritdoc}
     */
    public function reportEnd()
    {
        return ']';
    }

    /**
     * {@inheritdoc}
     */
    public function formatIssue(Issue $issue)
    {
        $json = json_encode($issue->toArray());

        if (!$this->isFirstIssue) {
            $json = ', '.$json;
        }

        $this->isFirstIssue = false;

        return $json;
    }
}
