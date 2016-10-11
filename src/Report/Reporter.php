<?php

namespace PHPSA\Report;

use PHPSA\Report\Formatter\ReportFormatter;
use Symfony\Component\Console\Output\OutputInterface as Output;
use PHPSA\IssuesCollector;

class Reporter
{
    protected $output;
    protected $formatter;

    public function __construct(ReportFormatter $formatter, Output $output)
    {
        $this->formatter = $formatter;
        $this->output = $output;
    }

    public function report(IssuesCollector $issuesCollector)
    {
        $this->output->write($this->formatter->reportBeginning());

        foreach ($issuesCollector->getIssues() as $issue) {
            $this->output->write($this->formatter->formatIssue($issue));
        }

        $this->output->write($this->formatter->reportEnd());
    }
}
