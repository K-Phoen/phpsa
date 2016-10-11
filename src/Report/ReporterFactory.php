<?php

namespace PHPSA\Report;

class ReporterFactory
{
    protected $reporters = [];

    public static function create()
    {
        return new self([
            'json' => new JsonReporter(),
        ]);
    }

    public function __construct(array $reporters = [])
    {
        foreach ($reporters as $format => $reporter) {
            $this->registerReporter($format, $reporter);
        }
    }

    /**
     * @param string $format
     * @param Reporter $reporter
     */
    public function registerReporter($format, Reporter $reporter)
    {
        $this->reporters[$format] = $reporter;
    }

    /**
     * @param string $format
     * @return Reporter
     *
     * @throws \LogicException If no reporter is registered for the given format.
     */
    public function getReporter($format)
    {
        if (array_key_exists($format, $this->reporters)) {
            return $this->reporters[$format];
        }

        throw new \LogicException(sprintf('No reporter registered for format "%s".', $format));
    }
}
