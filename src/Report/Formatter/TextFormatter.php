<?php

namespace PHPSA\Report\Formatter;

use PHPSA\Issue;

class TextFormatter implements ReportFormatter
{
    /**
     * {@inheritdoc}
     */
    public function reportBeginning()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function reportEnd()
    {
        return '';
    }

    /**
     * @param Issue $issue
     *
     * @return string The formatted issue.
     */
    public function formatIssue(Issue $issue)
    {
        if ($issue->getCheckName() === 'syntax-error') {
            return $this->formatSyntaxError($issue);
        }

        return $this->formatNotice($issue);
    }

    private function formatSyntaxError(Issue $issue)
    {
        $filepath = $issue->getLocation()->getFilePath();
        $line = $issue->getLocation()->getLineStart();
        $codeLines = file($filepath);

        $output = '<error>Syntax error:  ' . $issue->getDescription() . " in {$filepath} </error>\n\n";

        $lineContent = trim($codeLines[$line-1]);
        if (!empty($lineContent)) {
            $output .= "<comment>\t {$lineContent} </comment>\n";
        }

        return $output . "\n";
    }

    private function formatNotice(Issue $issue)
    {
        $filepath = $issue->getLocation()->getFilePath();
        $line = $issue->getLocation()->getLineStart();
        $codeLines = file($filepath);

        $output = '<comment>Notice:  ' . $issue->getDescription() . " in {$filepath} on {$line} [{$issue->getCheckName()}]</comment>\n\n";

        if ($issue->getBlame()) {
            $output .= "<comment>\t {$issue->getBlame()}</comment>\n";
        } else {
            $code = trim($codeLines[$line - 1]);

            if (!empty($code)) {
                $output .= "<comment>\t {$code} </comment>\n";
            }
        }

        return $output . "\n";
    }
}
