<?php

namespace PHPSA\Report;

use Symfony\Component\Console\Output\OutputInterface;
use PHPSA\Report\Formatter;

class ReporterFactory
{
    protected $formatters = [];

    public static function create()
    {
        return new self([
            'json' => new Formatter\JsonFormatter(),
            'text' => new Formatter\TextFormatter(),
        ]);
    }

    public function __construct(array $formatters = [])
    {
        foreach ($formatters as $format => $formatter) {
            $this->registerFormatter($format, $formatter);
        }
    }

    /**
     * @param string $format
     * @param Formatter\ReportFormatter $formatter
     */
    public function registerFormatter($format, Formatter\ReportFormatter $formatter)
    {
        $this->formatters[$format] = $formatter;
    }

    /**
     * @param string $format
     * @param OutputInterface $output
     *
     * @return Reporter
     *
     * @throws \LogicException If no reporter is registered for the given format.
     */
    public function getReporter($format, OutputInterface $output)
    {
        if (array_key_exists($format, $this->formatters)) {
            return new Reporter($this->formatters[$format], $output);
        }

        throw new \LogicException(sprintf('No reporter registered for format "%s".', $format));
    }
}
